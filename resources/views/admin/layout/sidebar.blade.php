<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">{{ __('Admin Dashboard') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
          <ul
            role="menu"
            data-accordion="false"
            data-widget="treeview"
            class="nav nav-pills nav-sidebar flex-column"
          >

            <li class="nav-item">
              <a href="myProfile.html" class="nav-link">
                <i class="fas fa-user-circle"></i>
                <p>
                  {{ __('My Profile') }}
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('user-list.index') }}" class="nav-link">
                  <i class="fas fa-user-shield"></i>
                  <p>
                      {{ __('User List') }}
                  </p>
              </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                    <i class="fas fa-user-shield"></i>
                    <p>
                        {{ __('Update User') }}
                    </p>
                </a>
                </li>

            <li class="nav-item">
              <a href="{{ route('category.index') }}" class="nav-link">
                <i class="fas fa-list"></i>
                <p>
                  {{ __('Category') }}
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('post.index') }}" class="nav-link">
                <i class="fas fa-pizza-slice ms-5"></i>
                <p>
                  {{ __('Post') }}
                </p>
              </a>
            </li>

           <li class="nav-item">
              <a href="user.html" class="nav-link">
              <i class="fas fa-users"></i>
                <p>
                  {{ __('Trend Post') }}
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a
                class="nav-link bg-danger"
                onclick="document.getElementById('logout-form').submit()"
              >
                <i class="fas fa-sign-out-alt"></i>
                <p>
                  {{ __('Logout') }}
                </p>
              </a>
            </li>

          <form action="{{ route('logout') }}" method="POST" id="logout-form">
              @csrf
          </form>
          </ul>
        </nav>
    </div>
</aside>
