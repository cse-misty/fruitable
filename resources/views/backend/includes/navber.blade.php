 <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>

        <ul class="navbar-nav navbar-right">
          {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
              <span class="badge headerBadge1">
                6 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="{{asset('backend/assets/img/users/user-1.png')}}" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">John
                      Deo</span>
                    <span class="time messege-text">Please check your mail !!</span>
                    <span class="time">2 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="{{asset('backend/assets/img/users/user-2.png')}}" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Request for leave
                      application</span>
                    <span class="time">5 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="{{asset('backend/assets/img/users/user-5.png')}}" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                      Ryan</span> <span class="time messege-text">Your payment invoice is
                      generated.</span> <span class="time">12 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="{{asset('backend/assets/img/users/user-4.png')}}" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                      Smith</span> <span class="time messege-text">hii John, I have upload
                      doc
                      related to task.</span> <span class="time">30
                      Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="{{asset('backend/assets/img/users/user-3.png')}}" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                      Joshi</span> <span class="time messege-text">Please do as specify.
                      Let me
                      know if you have any query.</span> <span class="time">1
                      Days Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="{{asset('backend/assets/img/users/user-2.png')}}" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Client Requirements</span>
                    <span class="time">2 Days Ago</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All  <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li> --}}



          {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                    class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                  </span> <span class="dropdown-item-desc"> Template update is
                    available now! <span class="time">2 Min
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="far
												fa-user"></i>
                  </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                      Sugiharto</b> are now friends <span class="time">10 Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i
                      class="fas
												fa-check"></i>
                  </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                    moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                      Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i
                      class="fas fa-exclamation-triangle"></i>
                  </span> <span class="dropdown-item-desc"> Low disk space. Let's
                    clean it! <span class="time">17 Hours Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
												fa-bell"></i>
                  </span> <span class="dropdown-item-desc"> Welcome to Otika
                    template! <span class="time">Yesterday</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>

          </li> --}}

<li class="dropdown dropdown-list-toggle">
    <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle">
        <i data-feather="mail"></i>


        <span class="badge headerBadge1" id="message-badge-count">
             {{ isset($contacts) ? $contacts->count() : 0 }}
        </span>
    </a>

    <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
        <div class="dropdown-header">
            Messages
            <div class="float-right">
                <a href="#">Mark All As Read</a>
            </div>
        </div>


        <div class="dropdown-list-content dropdown-list-message" id="live-message-dropdown">


            @isset($contacts)
                @foreach($contacts->take(5) as $contact)
                <a href="{{ route('contact.index') }}" class="dropdown-item">
                    {{-- <span class="dropdown-item-avatar text-white">
                        <img alt="image" src="{{ asset('backend/assets/img/users/user-1.png') }}" class="rounded-circle">
                    </span> --}}
                    <span class="dropdown-item-desc">
                        <span class="message-user">{{ $contact->name }}</span>
                        <span class="time messege-text text-truncate" style="max-width: 220px;">
                            {{ $contact->message }}
                        </span>
                        <span class="time">{{ $contact->created_at->diffForHumans() }}</span>
                    </span>
                </a>
                @endforeach
            @endisset

        </div>

        <div class="dropdown-footer text-center">
            <a href="{{ route('contact.index') }}">View All <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</li>



          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{asset('backend/assets/img/user.png')}}"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Sarah Smith</div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}"
                    class="dropdown-item has-icon text-danger"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </form>
            </div>
          </li>
        </ul>
      </nav>



 <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


 <script>

    document.addEventListener("DOMContentLoaded", function() {
        let savedCount = parseInt(localStorage.getItem('unread_message_count')) || 0;
        let badgeEl = document.getElementById('message-badge-count');

        if (badgeEl && savedCount > 0) {
            badgeEl.innerText = savedCount;
            badgeEl.style.display = 'inline-block';
        } else if (badgeEl) {
            badgeEl.style.display = 'none';
        }

        let messageToggleBtn = document.querySelector('.message-toggle');
        if (messageToggleBtn) {
            messageToggleBtn.addEventListener('click', function() {
                if (badgeEl) {
                    badgeEl.innerText = '0';
                    badgeEl.style.display = 'none';
                }
                localStorage.setItem('unread_message_count', 0);
            });
        }
    });

    // ২. পুশার কনফিগারেশন
    var pusher = new Pusher('c5b10a2ccd3d71f9dd5d', {
        cluster: 'mt1',
        forceTLS: true
    });

    var channel = pusher.subscribe('admin-notification-channel');


    channel.bind('new-contact-submit', function (data) {
        let badgeEl = document.getElementById('message-badge-count');


        let currentCount = parseInt(localStorage.getItem('unread_message_count')) || 0;
        let newCount = currentCount + 1;


        localStorage.setItem('unread_message_count', newCount);


        if (badgeEl) {
            badgeEl.style.display = 'inline-block';
            badgeEl.innerText = newCount;
        }


        let dropdownContainer = document.getElementById('live-message-dropdown');
        if (dropdownContainer) {
            let defaultUserImage = "{{ asset('backend/assets/img/users/user-1.png') }}";

            let newMessageHTML = `
                <a href="{{ route('contact.index') }}" class="dropdown-item bg-light">
                    <span class="dropdown-item-avatar">
                        <img src="${defaultUserImage}" class="rounded-circle" width="35" height="35">
                    </span>
                    <span class="dropdown-item-desc" style="padding-left: 10px;">
                        <b style="color:#6777ef">${data.name}</b>
                        <div class="time messege-text text-truncate" style="max-width: 220px;">New Contact Message!</div>
                        <div class="time" style="color: #6777ef;">Just now</div>
                    </span>
                </a>
            `;
            dropdownContainer.insertAdjacentHTML('afterbegin', newMessageHTML);
        }

        if (typeof Swal !== 'undefined') {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'info',
                title: `${data.name} sent a message`,
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true
            });
        }
    });
</script>
