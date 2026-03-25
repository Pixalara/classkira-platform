<!-- Footer Area Start -->
<footer class="footer-area">
   <!-- footer Top Area -->
    <div class="footer-top">
         <div class="container-xl">
             <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
                    <div class="footer-items">
                        <div class="footer-logo mb-3">
                            <a href="#" aria-label="ClassKira">
                                <img src="{{ asset('frontend/assets/image/new-logo.png') }}" alt="ClassKira" class="logo-img">
                            </a>
                        </div>
                        <p>ClassKira is a comprehensive, enterprise-grade School Management System (SMS/LMS) built to empower modern educational institutions. We unify student admissions, academics, finance, and communication into one seamless platform, accessible for every stakeholder.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
                    <div class="contacts footer-items">
                        <h4>Contact Us</h4>
                        <ul class="ad-contacts">
                            <li><a href="tel:+919988688654"><i class="fa-solid fa-phone"></i> +91 - 99886-88654</a></li>
                            <li><a href="mailto:sales@classkira.com"><i class="fa-solid fa-envelope"></i> sales@classkira.com</a></li>
                            <li><span><i class="fa-solid fa-location-dot"></i></span><p>Pixalara LLP, Whitefield, Bengaluru, India.</p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
                    <div class="addons footer-items">
                        <h4>Legal</h4>
                        <ul class="ad-contacts">
                            <li><a href="{{ route('privacy.policy') }}" target="_blank">Privacy Policy</a></li>
                            <li><a href="{{ route('terms') }}" target="_blank">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-5">
                    <div class="addons footer-items">
                        <h4>Connect With Us</h4>
                        <ul class="footer-social">
                            <li><a href="https://x.com/pixalara" title="X (Twitter)" target="_blank" rel="noopener noreferrer" aria-label="X"><svg viewBox="0 0 24 24" fill="currentColor" style="width:16px;height:16px"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a></li>
                            <li><a href="https://www.linkedin.com/company/pixalara" title="LinkedIn" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            <li><a href="https://www.instagram.com/pixalara/" title="Instagram" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="https://www.youtube.com/@pixalara" title="YouTube" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a></li>
                        </ul>
                    </div>
              @php
                $all_languages = get_all_language();



              @endphp
              @if(Auth::check() && auth()->user()->role_id == 1)
              @php
                  $usersinfo = DB::table('users')->where('id', auth()->user()->id)->first();

                  $userlanguage = $usersinfo->language;
              @endphp
              <div class="adminTable-action" style="margin-right: 20px; margin-top: 14px;">
                <button
                  type="button"
                  class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  style="width: 91px; height: 29px; padding: 0;"
                >
                   <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" class="ep0rzf NMm5M" style="width: 17px"><path d="M12.87 15.07l-2.54-2.51.03-.03A17.52 17.52 0 0 0 14.07 6H17V4h-7V2H8v2H1v1.99h11.17C11.5 7.92 10.44 9.75 9 11.35 8.07 10.32 7.3 9.19 6.69 8h-2c.73 1.63 1.73 3.17 2.98 4.56l-5.09 5.02L4 19l5-5 3.11 3.11.76-2.04zM18.5 10h-2L12 22h2l1.12-3h4.75L21 22h2l-4.5-12zm-2.62 7l1.62-4.33L19.12 17h-3.24z"></path></svg>

                    @if(!empty($userlanguage))
                   <span style="font-size: 10px;">{{ucwords($userlanguage)}}</span>
                   @else
                   <span style="font-size: 10px;">{{ucwords(get_settings('language'))}}</span>
                   @endif
                </button>

                    <ul style="min-width: 0;" class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                      <form method="post" id="languageForm" action="{{ route('superadmin.language') }}">
                        @csrf
                        @foreach ($all_languages as $all_language)
                            <li>
                                <a class="dropdown-item language-item" href="javascript:;" data-language-name="{{ $all_language->name }}">{{ ucwords($all_language->name) }}</a>
                            </li>
                        @endforeach
                        <input type="hidden" name="language" id="selectedLanguageName">
                    </form>
                    </ul>
                  </div>
                  @elseif(Auth::check() && auth()->user()->role_id == 2)
                  @php
                  $usersinfo = DB::table('users')->where('id', auth()->user()->id)->first();

                  $userlanguage = $usersinfo->language;
                  @endphp
                  <div class="adminTable-action" style="margin-right: 20px; margin-top: 14px;">
                    <button
                      type="button"
                      class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      style="width: 91px; height: 29px; padding: 0; border: none; border-radius: 8px;"
                    >
                       <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" class="ep0rzf NMm5M" style="width: 17px"><path d="M12.87 15.07l-2.54-2.51.03-.03A17.52 17.52 0 0 0 14.07 6H17V4h-7V2H8v2H1v1.99h11.17C11.5 7.92 10.44 9.75 9 11.35 8.07 10.32 7.3 9.19 6.69 8h-2c.73 1.63 1.73 3.17 2.98 4.56l-5.09 5.02L4 19l5-5 3.11 3.11.76-2.04zM18.5 10h-2L12 22h2l1.12-3h4.75L21 22h2l-4.5-12zm-2.62 7l1.62-4.33L19.12 17h-3.24z"></path></svg>
                       @if(!empty($userlanguage))
                       <span style="font-size: 10px;">{{ucwords($userlanguage)}}</span>
                       @else
                       <span style="font-size: 10px;">{{ucwords(get_settings('language'))}}</span>
                       @endif
                    </button>

                    <ul style="min-width: 0;" class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                      <form method="post" id="languageForm" action="{{ route('admin.language') }}">
                        @csrf
                        @foreach ($all_languages as $all_language)
                            <li>
                                <a class="dropdown-item language-item" href="javascript:;" data-language-name="{{ $all_language->name }}">{{ ucwords($all_language->name) }}</a>
                            </li>
                        @endforeach
                        <input type="hidden" name="language" id="selectedLanguageName">
                    </form>
                    </ul>
                  </div>
                  @elseif(Auth::check() && auth()->user()->role_id == 3)
                  @php
                  $usersinfo = DB::table('users')->where('id', auth()->user()->id)->first();

                  $userlanguage = $usersinfo->language;
                  @endphp
                  <div class="adminTable-action" style="margin-right: 20px; margin-top: 14px;">
                    <button
                      type="button"
                      class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      style="width: 91px; height: 29px; padding: 0; border: none; border-radius: 8px;"
                    >
                       <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" class="ep0rzf NMm5M" style="width: 17px"><path d="M12.87 15.07l-2.54-2.51.03-.03A17.52 17.52 0 0 0 14.07 6H17V4h-7V2H8v2H1v1.99h11.17C11.5 7.92 10.44 9.75 9 11.35 8.07 10.32 7.3 9.19 6.69 8h-2c.73 1.63 1.73 3.17 2.98 4.56l-5.09 5.02L4 19l5-5 3.11 3.11.76-2.04zM18.5 10h-2L12 22h2l1.12-3h4.75L21 22h2l-4.5-12zm-2.62 7l1.62-4.33L19.12 17h-3.24z"></path></svg>
                       @if(!empty($userlanguage))
                       <span style="font-size: 10px;">{{ucwords($userlanguage)}}</span>
                       @else
                       <span style="font-size: 10px;">{{ucwords(get_settings('language'))}}</span>
                       @endif
                    </button>

                    <ul style="min-width: 0;" class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                      <form method="post" id="languageForm" action="{{ route('teacher.language') }}">
                        @csrf
                        @foreach ($all_languages as $all_language)
                            <li>
                                <a class="dropdown-item language-item" href="javascript:;" data-language-name="{{ $all_language->name }}">{{ ucwords($all_language->name) }}</a>
                            </li>
                        @endforeach
                        <input type="hidden" name="language" id="selectedLanguageName">
                    </form>
                    </ul>
                  </div>
                  @elseif(Auth::check() && auth()->user()->role_id == 4)
                  <div class="adminTable-action" style="margin-right: 20px; margin-top: 14px;">
                    <button
                      type="button"
                      class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      style="width: 91px; height: 29px; padding: 0; border: none; border-radius: 8px;"
                    >
                       <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" class="ep0rzf NMm5M" style="width: 17px"><path d="M12.87 15.07l-2.54-2.51.03-.03A17.52 17.52 0 0 0 14.07 6H17V4h-7V2H8v2H1v1.99h11.17C11.5 7.92 10.44 9.75 9 11.35 8.07 10.32 7.3 9.19 6.69 8h-2c.73 1.63 1.73 3.17 2.98 4.56l-5.09 5.02L4 19l5-5 3.11 3.11.76-2.04zM18.5 10h-2L12 22h2l1.12-3h4.75L21 22h2l-4.5-12zm-2.62 7l1.62-4.33L19.12 17h-3.24z"></path></svg>
                       @if(!empty($userlanguage))
                       <span style="font-size: 10px;">{{ucwords($userlanguage)}}</span>
                       @else
                       <span style="font-size: 10px;">{{ucwords(get_settings('language'))}}</span>
                       @endif
                    </button>

                    <ul style="min-width: 0;" class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                      <form method="post" id="languageForm" action="{{ route('accountant.language') }}">
                        @csrf
                        @foreach ($all_languages as $all_language)
                            <li>
                                <a class="dropdown-item language-item" href="javascript:;" data-language-name="{{ $all_language->name }}">{{ ucwords($all_language->name) }}</a>
                            </li>
                        @endforeach
                        <input type="hidden" name="language" id="selectedLanguageName">
                    </form>
                    </ul>
                  </div>
                  @elseif(Auth::check() && auth()->user()->role_id == 5)
                  @php
                  $usersinfo = DB::table('users')->where('id', auth()->user()->id)->first();

                  $userlanguage = $usersinfo->language;
                  @endphp
                  <div class="adminTable-action" style="margin-right: 20px; margin-top: 14px;">
                    <button
                      type="button"
                      class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      style="width: 91px; height: 29px; padding: 0; border: none; border-radius: 8px;"
                    >
                       <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" class="ep0rzf NMm5M" style="width: 17px"><path d="M12.87 15.07l-2.54-2.51.03-.03A17.52 17.52 0 0 0 14.07 6H17V4h-7V2H8v2H1v1.99h11.17C11.5 7.92 10.44 9.75 9 11.35 8.07 10.32 7.3 9.19 6.69 8h-2c.73 1.63 1.73 3.17 2.98 4.56l-5.09 5.02L4 19l5-5 3.11 3.11.76-2.04zM18.5 10h-2L12 22h2l1.12-3h4.75L21 22h2l-4.5-12zm-2.62 7l1.62-4.33L19.12 17h-3.24z"></path></svg>
                       @if(!empty($userlanguage))
                       <span style="font-size: 10px;">{{ucwords($userlanguage)}}</span>
                       @else
                       <span style="font-size: 10px;">{{ucwords(get_settings('language'))}}</span>
                       @endif
                    </button>

                    <ul style="min-width: 0;" class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                      <form method="post" id="languageForm" action="{{ route('librarian.language') }}">
                        @csrf
                        @foreach ($all_languages as $all_language)
                            <li>
                                <a class="dropdown-item language-item" href="javascript:;" data-language-name="{{ $all_language->name }}">{{ ucwords($all_language->name) }}</a>
                            </li>
                        @endforeach
                        <input type="hidden" name="language" id="selectedLanguageName">
                    </form>
                    </ul>
                  </div>
                  @elseif(Auth::check() && auth()->user()->role_id == 6)
                  @php
                  $usersinfo = DB::table('users')->where('id', auth()->user()->id)->first();

                  $userlanguage = $usersinfo->language;
                 @endphp
                  <div class="adminTable-action" style="margin-right: 20px; margin-top: 14px;">
                    <button
                      type="button"
                      class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      style="width: 91px; height: 29px; padding: 0; border: none; border-radius: 8px;"
                    >
                       <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" class="ep0rzf NMm5M" style="width: 17px"><path d="M12.87 15.07l-2.54-2.51.03-.03A17.52 17.52 0 0 0 14.07 6H17V4h-7V2H8v2H1v1.99h11.17C11.5 7.92 10.44 9.75 9 11.35 8.07 10.32 7.3 9.19 6.69 8h-2c.73 1.63 1.73 3.17 2.98 4.56l-5.09 5.02L4 19l5-5 3.11 3.11.76-2.04zM18.5 10h-2L12 22h2l1.12-3h4.75L21 22h2l-4.5-12zm-2.62 7l1.62-4.33L19.12 17h-3.24z"></path></svg>
                       @if(!empty($userlanguage))
                       <span style="font-size: 10px;">{{ucwords($userlanguage)}}</span>
                       @else
                       <span style="font-size: 10px;">{{ucwords(get_settings('language'))}}</span>
                       @endif
                    </button>

                    <ul style="min-width: 0;" class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                      <form method="post" id="languageForm" action="{{ route('parent.language') }}">
                        @csrf
                        @foreach ($all_languages as $all_language)
                            <li>
                                <a class="dropdown-item language-item" href="javascript:;" data-language-name="{{ $all_language->name }}">{{ ucwords($all_language->name) }}</a>
                            </li>
                        @endforeach
                        <input type="hidden" name="language" id="selectedLanguageName">
                    </form>
                    </ul>
                  </div>
                  @elseif(Auth::check() && auth()->user()->role_id == 7)
                  @php
                  $usersinfo = DB::table('users')->where('id', auth()->user()->id)->first();

                  $userlanguage = $usersinfo->language;
                    @endphp
                  <div class="adminTable-action" style="margin-right: 20px; margin-top: 14px;">
                    <button
                      type="button"
                      class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      style="width: 91px; height: 29px; padding: 0; border: none; border-radius: 8px;"
                    >
                       <svg width="24" height="24" viewBox="0 0 24 24" focusable="false" class="ep0rzf NMm5M" style="width: 17px"><path d="M12.87 15.07l-2.54-2.51.03-.03A17.52 17.52 0 0 0 14.07 6H17V4h-7V2H8v2H1v1.99h11.17C11.5 7.92 10.44 9.75 9 11.35 8.07 10.32 7.3 9.19 6.69 8h-2c.73 1.63 1.73 3.17 2.98 4.56l-5.09 5.02L4 19l5-5 3.11 3.11.76-2.04zM18.5 10h-2L12 22h2l1.12-3h4.75L21 22h2l-4.5-12zm-2.62 7l1.62-4.33L19.12 17h-3.24z"></path></svg>
                       @if(!empty($userlanguage))
                       <span style="font-size: 10px;">{{ucwords($userlanguage)}}</span>
                       @else
                       <span style="font-size: 10px;">{{ucwords(get_settings('language'))}}</span>
                       @endif
                    </button>

                    <ul style="min-width: 0;" class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action">
                      <form method="post" id="languageForm" action="{{ route('student.language') }}">
                        @csrf
                        @foreach ($all_languages as $all_language)
                            <li>
                                <a class="dropdown-item language-item" href="javascript:;" data-language-name="{{ $all_language->name }}">{{ ucwords($all_language->name) }}</a>
                            </li>
                        @endforeach
                        <input type="hidden" name="language" id="selectedLanguageName">
                    </form>
                    </ul>
                  </div>
                  @else
                  @endif
                </div>
          </div>
     </div>
    <div class="footer-bottom">
         <div class="copyright-text">
           <p>© 2026 ClassKira - Pixalara LLP. All rights reserved.</p>
        </div>
    </div>
</footer>
<!-- Footer Area End -->