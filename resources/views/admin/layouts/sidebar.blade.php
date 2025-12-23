<!-- Sidebar -->
<div class="sidebar w-64 flex-shrink-0 fixed lg:relative h-full z-30 transform transition-transform duration-300 ease-in-out lg:transform-none -translate-x-full lg:translate-x-0"
    id="sidebar">
    <div class="flex flex-col h-full">
        <!-- Logo -->
        <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-primary-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-cog text-white"></i>
                </div>
                <span class="text-xl font-bold text-gray-900 dark:text-white">Admin Panel</span>
            </a>
            <button id="sidebar-toggle"
                class="lg:hidden text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>

            <!-- Content Dropdown -->
            <details class="dropdown">
                <summary class="nav-link flex items-center justify-between w-full px-4 py-3 rounded-lg {{ request()->routeIs('admin.content*') || request()->routeIs('admin.about*') ? 'active' : '' }}">
                    <div class="flex items-center">
                        <i class="fas fa-file-alt mr-3"></i>
                        <span>Content</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs"></i>
                </summary>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item {{ request()->routeIs('admin.content*') ? 'active' : '' }}" href="{{ route('admin.content') }}">General Content</a></li>
                    <li><a class="dropdown-item {{ request()->routeIs('admin.content.home*') ? 'active' : '' }}" href="{{ route('admin.content.home') }}">Home Page</a></li>
                    <li><a class="dropdown-item {{ request()->routeIs('admin.about*') ? 'active' : '' }}" href="{{ route('admin.about.index') }}">About Page</a></li>
                </ul>
            </details>

            <!-- Projects Dropdown -->
            <details class="dropdown">
                <summary class="nav-link flex items-center justify-between w-full px-4 py-3 rounded-lg {{ request()->routeIs('admin.projects*') || request()->routeIs('admin.project-detail-content*') ? 'active' : '' }}">
                    <div class="flex items-center">
                        <i class="fas fa-briefcase mr-3"></i>
                        <span>Projects</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs"></i>
                </summary>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item {{ request()->routeIs('admin.projects.index') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">All Projects</a></li>
                    <li><a class="dropdown-item {{ request()->routeIs('admin.project-detail-content*') ? 'active' : '' }}" href="{{ route('admin.project-detail-content') }}">Project Details</a></li>
                </ul>
            </details>

            <!-- Skills Dropdown -->
            <details class="dropdown">
                <summary class="nav-link flex items-center justify-between w-full px-4 py-3 rounded-lg {{ request()->routeIs('admin.skills*') || request()->routeIs('admin.skills-page-content*') ? 'active' : '' }}">
                    <div class="flex items-center">
                        <i class="fas fa-code mr-3"></i>
                        <span>Skills</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs"></i>
                </summary>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item {{ request()->routeIs('admin.skills.index') ? 'active' : '' }}" href="{{ route('admin.skills.index') }}">All Skills</a></li>
                    <li><a class="dropdown-item {{ request()->routeIs('admin.skills-page-content*') ? 'active' : '' }}" href="{{ route('admin.skills-page-content') }}">Skills Details</a></li>
                </ul>
            </details>

            <a href="{{ route('admin.certificates.index') }}"
                class="nav-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.certificates*') ? 'active' : '' }}">
                <i class="fas fa-certificate mr-3"></i>
                Certificates
            </a>

            <!-- Contact Dropdown -->
            <details class="dropdown">
                <summary class="nav-link flex items-center justify-between w-full px-4 py-3 rounded-lg {{ request()->routeIs('admin.messages*') || request()->routeIs('admin.social*') || request()->routeIs('admin.settings*') ? 'active' : '' }}">
                    <div class="flex items-center">
                        <i class="fas fa-envelope mr-3"></i>
                        <span>Contact</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs"></i>
                </summary>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item {{ request()->routeIs('admin.messages*') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">Messages</a></li>
                    <li><a class="dropdown-item {{ request()->routeIs('admin.social*') ? 'active' : '' }}" href="{{ route('admin.social.index') }}">Social Links</a></li>
                    <li><a class="dropdown-item {{ request()->routeIs('admin.settings*') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">Contact Settings</a></li>
                </ul>
            </details>

            <a href="{{ route('admin.profile.edit') }}"
                class="nav-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.profile*') ? 'active' : '' }}">
                <i class="fas fa-user mr-3"></i>
                Profile
            </a>
        </nav>

        <!-- User menu -->
        <div class="p-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-primary-600 flex items-center justify-center mr-3">
                    <i class="fas fa-user text-white"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900 dark:text-white">
                        {{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name : 'Admin' }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Administrator</p>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="text-gray-500 dark:text-gray-400 hover:text-red-500 dark:hover:text-red-400">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
