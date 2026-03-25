{{-- ============================================================
    CLASSKIRA — School Registration Modal (3-step form)
    Frontend-only modal, included via @include('components.register-modal')
   ============================================================ --}}

<div class="ck-modal-overlay" id="registerModal">
  <div class="modal-card">
    <button type="button" class="ck-modal-close" id="ckModalClose" aria-label="Close" onclick="closeRegisterModal()">&times;</button>

    <span class="ck-modal-badge">🏫 School Registration</span>
    <h2>Let's set up your school</h2>
    <p class="ck-subtitle">Takes less than 2 minutes. No credit card required.</p>

    <!-- Progress bar -->
    <div class="ck-progress">
      <div class="ck-progress-bar" id="ckProgressBar" style="width:33%"></div>
    </div>

    <form id="ckRegForm">

      <!-- ===== STEP 1 — School Details ===== -->
      <div class="modal-step active" data-step="1" style="transition:transform .3s ease,opacity .3s ease;">
        <label class="ck-modal-label">School Name *</label>
        <input type="text" class="ck-modal-input" id="regSchoolName" placeholder="E.g. Delhi Public School" required>

        <label class="ck-modal-label">School Type *</label>
        <select class="ck-modal-input" required>
          <option value="">Select type</option>
          <option value="Primary">Primary</option>
          <option value="Secondary">Secondary</option>
          <option value="Higher Secondary">Higher Secondary</option>
          <option value="International">International</option>
          <option value="Other">Other</option>
        </select>

        <label class="ck-modal-label">City *</label>
        <input type="text" class="ck-modal-input" placeholder="E.g. Mumbai" required>

        <label class="ck-modal-label">State *</label>
        <select class="ck-modal-input" required>
          <option value="">Select state</option>
          <option>Andhra Pradesh</option><option>Arunachal Pradesh</option><option>Assam</option>
          <option>Bihar</option><option>Chhattisgarh</option><option>Goa</option><option>Gujarat</option>
          <option>Haryana</option><option>Himachal Pradesh</option><option>Jharkhand</option>
          <option>Karnataka</option><option>Kerala</option><option>Madhya Pradesh</option>
          <option>Maharashtra</option><option>Manipur</option><option>Meghalaya</option>
          <option>Mizoram</option><option>Nagaland</option><option>Odisha</option><option>Punjab</option>
          <option>Rajasthan</option><option>Sikkim</option><option>Tamil Nadu</option>
          <option>Telangana</option><option>Tripura</option><option>Uttar Pradesh</option>
          <option>Uttarakhand</option><option>West Bengal</option>
          <option>Andaman & Nicobar</option><option>Chandigarh</option><option>Delhi</option>
          <option>Jammu & Kashmir</option><option>Ladakh</option><option>Lakshadweep</option>
          <option>Puducherry</option>
        </select>

        <label class="ck-modal-label">Board Affiliation</label>
        <select class="ck-modal-input">
          <option value="">Select board</option>
          <option>CBSE</option><option>ICSE</option><option>State Board</option>
          <option>IB</option><option>Cambridge</option><option>Other</option>
        </select>

        <label class="ck-modal-label">Number of Students</label>
        <select class="ck-modal-input">
          <option value="">Select range</option>
          <option>&lt;200</option><option>200–500</option><option>500–1000</option>
          <option>1000–2000</option><option>2000+</option>
        </select>

        <div class="ck-modal-actions">
          <button type="button" class="ck-btn ck-btn-primary" style="width:100%" onclick="goToStep(2,'forward')">Continue →</button>
        </div>
      </div>

      <!-- ===== STEP 2 — Admin Contact ===== -->
      <div class="modal-step" data-step="2" style="transition:transform .3s ease,opacity .3s ease;">
        <label class="ck-modal-label">Admin Full Name *</label>
        <input type="text" class="ck-modal-input" id="regAdminName" placeholder="E.g. Dr. Priya Sharma" required>

        <label class="ck-modal-label">Designation *</label>
        <input type="text" class="ck-modal-input" placeholder="Principal, IT Head, Admin Officer..." required>

        <label class="ck-modal-label">Official Email *</label>
        <input type="email" class="ck-modal-input" placeholder="admin@school.edu.in" required>

        <label class="ck-modal-label">Phone Number *</label>
        <div style="display:flex;gap:8px;">
          <input type="text" class="ck-modal-input" value="+91" readonly style="width:64px;text-align:center;flex-shrink:0">
          <input type="tel" class="ck-modal-input" placeholder="98765 43210" required style="flex:1">
        </div>

        <label class="ck-checkbox" style="margin-bottom:8px;margin-top:4px">
          <input type="checkbox" checked>
          WhatsApp for updates?
        </label>

        <div class="ck-modal-actions">
          <button type="button" class="ck-btn ck-btn-ghost" onclick="goToStep(1,'backward')">← Back</button>
          <button type="button" class="ck-btn ck-btn-primary" onclick="goToStep(3,'forward')">Continue →</button>
        </div>
      </div>

      <!-- ===== STEP 3 — Confirmation ===== -->
      <div class="modal-step" data-step="3" style="transition:transform .3s ease,opacity .3s ease;">
        <div class="ck-summary-card">
          <p><strong>School:</strong> <span id="summarySchool">—</span></p>
          <p><strong>Admin:</strong> <span id="summaryAdmin">—</span></p>
        </div>
        <p style="font-size:14px;color:var(--muted);font-weight:600;margin-bottom:20px;">Our team will reach out within 24 hours to schedule your onboarding call.</p>

        <label class="ck-modal-label">How did you hear about us?</label>
        <select class="ck-modal-input">
          <option value="">Select</option>
          <option>Google</option><option>Referral</option><option>Social Media</option>
          <option>Conference</option><option>Other</option>
        </select>

        <label class="ck-modal-label">Any message for our team?</label>
        <textarea class="ck-modal-input" placeholder="Optional — tell us about your needs"></textarea>

        <div class="ck-modal-actions">
          <button type="button" class="ck-btn ck-btn-ghost" onclick="goToStep(2,'backward')">← Back</button>
          <button type="submit" class="ck-btn ck-btn-primary" style="flex:2">Submit Registration</button>
        </div>
      </div>

      <!-- ===== SUCCESS STATE ===== -->
      <div class="modal-step" id="regSuccess" style="transition:transform .3s ease,opacity .3s ease;">
        <div class="ck-success">
          <div class="ck-success-check">
            <svg fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
              <path d="M20 6L9 17l-5-5"/>
            </svg>
          </div>
          <h3>You're on the list! 🎉</h3>
          <p>We'll be in touch within 24 hours.</p>
          <button type="button" class="ck-btn ck-btn-ghost ck-btn-pill" onclick="closeRegisterModal()">Close</button>
        </div>
      </div>

    </form>
  </div>
</div>
