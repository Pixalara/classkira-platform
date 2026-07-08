#!/usr/bin/env bash
# Manual rolling-update deployment script.
#
# CI (GitHub Actions) builds, tests, tags, and pushes the image to ECR.
# This script is run manually (by an operator with kubectl access to the
# EKS cluster) to pull the new image from ECR and perform a rolling update
# of the running deployment.
#
# Usage:
#   ./rolling-update.sh <image-tag>
#
# Example:
#   ./rolling-update.sh a1b2c3d4e5f6...   # a GitHub commit SHA tag
#   ./rolling-update.sh latest

set -euo pipefail

AWS_REGION="us-east-1"
AWS_ACCOUNT_ID="305042756485"
ECR_REPOSITORY="classkira-platform"
CLUSTER_NAME="classkira-eks"
DEPLOYMENT="classkira-app"
CONTAINER_NAME="classkira"
NAMESPACE="default"

IMAGE_TAG="${1:-latest}"
IMAGE_URI="${AWS_ACCOUNT_ID}.dkr.ecr.${AWS_REGION}.amazonaws.com/${ECR_REPOSITORY}:${IMAGE_TAG}"

echo "==> Updating kubeconfig for cluster ${CLUSTER_NAME} in ${AWS_REGION}..."
aws eks update-kubeconfig --name "${CLUSTER_NAME}" --region "${AWS_REGION}"

echo "==> Verifying image exists in ECR..."
aws ecr describe-images \
  --repository-name "${ECR_REPOSITORY}" \
  --region "${AWS_REGION}" \
  --image-ids imageTag="${IMAGE_TAG}" >/dev/null

echo "==> Rolling update: setting image to ${IMAGE_URI}"
kubectl set image "deployment/${DEPLOYMENT}" "${CONTAINER_NAME}=${IMAGE_URI}" -n "${NAMESPACE}"

echo "==> Waiting for rollout to complete..."
kubectl rollout status "deployment/${DEPLOYMENT}" -n "${NAMESPACE}" --timeout=180s

echo "==> Rollout complete. Current pods:"
kubectl get pods -n "${NAMESPACE}" -l app=classkira-app -o wide
