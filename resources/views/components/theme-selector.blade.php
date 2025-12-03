<!-- Theme Selector -->
<div class="dropdown dropdown-end flex items-center" x-data="{ currentTheme: localStorage.getItem('theme') || 'light' }" x-init="$watch('currentTheme', value => localStorage.setItem('theme', value))" @theme-changed.window="currentTheme = $event.detail.theme">
    <label tabindex="0" class="btn btn-ghost btn-circle tooltip tooltip-bottom h-10 w-10 p-0 flex items-center justify-center" data-tip="Choose Theme">
        <i class="fas fa-palette text-lg" style="color: var(--color-base-content); opacity: var(--tw-text-opacity);"></i>
    </label>
    <ul tabindex="0"
        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-72 max-h-96 overflow-y-auto top-full">
        <li class="menu-title">
            <span class="text-base-content/70 font-semibold flex items-center"><span class="mr-2">🎨</span> Choose Theme</span>
        </li>

        <!-- Light Theme -->
        <li>
            <a @click="currentTheme = 'light'; localStorage.setItem('theme', 'light'); document.documentElement.setAttribute('data-theme', 'light'); window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: 'light' } }))"
                class="flex items-center gap-3 hover:bg-base-200 transition-all duration-200 rounded-lg p-2">
                <i class="fas fa-sun text-warning text-lg" style="color: var(--color-warning); opacity: var(--tw-text-opacity);"></i>
                <span class="font-medium text-base-content">Light</span>
                <div
                    class="ml-auto w-5 h-5 rounded-full bg-gradient-to-r from-warning to-warning-content border-2 border-warning shadow-sm">
                </div>
            </a>
        </li>

        <!-- Dark Theme -->
        <li>
            <a @click="currentTheme = 'dark'; localStorage.setItem('theme', 'dark'); document.documentElement.setAttribute('data-theme', 'dark'); window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: 'dark' } }))"
                class="flex items-center gap-3 hover:bg-base-200 transition-all duration-200 rounded-lg p-2">
                <i class="fas fa-moon text-info text-lg" style="color: var(--color-info); opacity: var(--tw-text-opacity);"></i>
                <span class="font-medium text-base-content">Dark</span>
                <div
                    class="ml-auto w-5 h-5 rounded-full bg-gradient-to-r from-neutral to-neutral-content border-2 border-neutral shadow-sm">
                </div>
            </a>
        </li>

        <!-- Cupcake Theme -->
        <li>
            <a @click="currentTheme = 'cupcake'; localStorage.setItem('theme', 'cupcake'); document.documentElement.setAttribute('data-theme', 'cupcake'); window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: 'cupcake' } }))"
                class="flex items-center gap-3 hover:bg-base-200 transition-all duration-200 rounded-lg p-2">
                <i class="fas fa-birthday-cake text-secondary text-lg"></i>
                <span class="font-medium text-base-content">Cupcake</span>
                <div
                    class="ml-auto w-5 h-5 rounded-full bg-gradient-to-r from-secondary to-secondary-content border-2 border-secondary shadow-sm">
                </div>
            </a>
        </li>

        <!-- Bumblebee Theme -->
        <li>
            <a @click="currentTheme = 'bumblebee'; localStorage.setItem('theme', 'bumblebee'); document.documentElement.setAttribute('data-theme', 'bumblebee'); window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: 'bumblebee' } }))"
                class="flex items-center gap-3 hover:bg-base-200 transition-all duration-200 rounded-lg p-2">
                <i class="fas fa-bug text-warning text-lg"></i>
                <span class="font-medium text-base-content">Bumblebee</span>
                <div
                    class="ml-auto w-5 h-5 rounded-full bg-gradient-to-r from-warning to-warning-content border-2 border-warning shadow-sm">
                </div>
            </a>
        </li>

        <!-- Emerald Theme -->
        <li>
            <a @click="currentTheme = 'emerald'; localStorage.setItem('theme', 'emerald'); document.documentElement.setAttribute('data-theme', 'emerald'); window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: 'emerald' } }))"
                class="flex items-center gap-3 hover:bg-base-200 transition-all duration-200 rounded-lg p-2">
                <i class="fas fa-gem text-success text-lg"></i>
                <span class="font-medium text-base-content">Emerald</span>
                <div
                    class="ml-auto w-5 h-5 rounded-full bg-gradient-to-r from-success to-success-content border-2 border-success shadow-sm">
                </div>
            </a>
        </li>

        <!-- Corporate Theme -->
        <li>
            <a @click="currentTheme = 'corporate'; localStorage.setItem('theme', 'corporate'); document.documentElement.setAttribute('data-theme', 'corporate'); window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: 'corporate' } }))"
                class="flex items-center gap-3 hover:bg-base-200 transition-all duration-200 rounded-lg p-2">
                <i class="fas fa-building text-primary text-lg"></i>
                <span class="font-medium text-base-content">Corporate</span>
                <div
                    class="ml-auto w-5 h-5 rounded-full bg-gradient-to-r from-primary to-primary-content border-2 border-primary shadow-sm">
                </div>
            </a>
        </li>

        <!-- Synthwave Theme -->
        <li>
            <a @click="currentTheme = 'synthwave'; localStorage.setItem('theme', 'synthwave'); document.documentElement.setAttribute('data-theme', 'synthwave'); window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: 'synthwave' } }))"
                class="flex items-center gap-3 hover:bg-base-200 transition-all duration-200 rounded-lg p-2">
                <i class="fas fa-wave-square text-accent text-lg"></i>
                <span class="font-medium text-base-content">Synthwave</span>
                <div
                    class="ml-auto w-5 h-5 rounded-full bg-gradient-to-r from-accent to-accent-content border-2 border-accent shadow-sm">
                </div>
            </a>
        </li>

        <!-- Retro Theme -->
        <li>
            <a @click="currentTheme = 'retro'; localStorage.setItem('theme', 'retro'); document.documentElement.setAttribute('data-theme', 'retro'); window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: 'retro' } }))"
                class="flex items-center gap-3 hover:bg-base-200 transition-all duration-200 rounded-lg p-2">
                <i class="fas fa-compact-disc text-warning text-lg"></i>
                <span class="font-medium text-base-content">Retro</span>
                <div
                    class="ml-auto w-5 h-5 rounded-full bg-gradient-to-r from-warning to-warning-content border-2 border-warning shadow-sm">
                </div>
            </a>
        </li>

        <!-- Cyberpunk Theme -->
        <li>
            <a @click="currentTheme = 'cyberpunk'; localStorage.setItem('theme', 'cyberpunk'); document.documentElement.setAttribute('data-theme', 'cyberpunk'); window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: 'cyberpunk' } }))"
                class="flex items-center gap-3 hover:bg-base-200 transition-all duration-200 rounded-lg p-2">
                <i class="fas fa-robot text-info text-lg"></i>
                <span class="font-medium text-base-content">Cyberpunk</span>
                <div
                    class="ml-auto w-5 h-5 rounded-full bg-gradient-to-r from-info to-info-content border-2 border-info shadow-sm">
                </div>
            </a>
        </li>

        <!-- Valentine Theme -->
        <li>
            <a @click="currentTheme = 'valentine'; localStorage.setItem('theme', 'valentine'); document.documentElement.setAttribute('data-theme', 'valentine'); window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: 'valentine' } }))"
                class="flex items-center gap-3 hover:bg-base-200 transition-all duration-200 rounded-lg p-2">
                <i class="fas fa-heart text-error text-lg"></i>
                <span class="font-medium text-base-content">Valentine</span>
                <div
                    class="ml-auto w-5 h-5 rounded-full bg-gradient-to-r from-error to-error-content border-2 border-error shadow-sm">
                </div>
            </a>
        </li>

        <!-- Halloween Theme -->
        <li>
            <a @click="currentTheme = 'halloween'; localStorage.setItem('theme', 'halloween'); document.documentElement.setAttribute('data-theme', 'halloween'); window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: 'halloween' } }))"
                class="flex items-center gap-3 hover:bg-base-200 transition-all duration-200 rounded-lg p-2">
                <i class="fas fa-ghost text-warning text-lg"></i>
                <span class="font-medium text-base-content">Halloween</span>
                <div
                    class="ml-auto w-5 h-5 rounded-full bg-gradient-to-r from-warning to-accent border-2 border-warning shadow-sm">
                </div>
            </a>
        </li>

        <!-- Garden Theme -->
        <li>
            <a @click="currentTheme = 'garden'; localStorage.setItem('theme', 'garden'); document.documentElement.setAttribute('data-theme', 'garden'); window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: 'garden' } }))"
                class="flex items-center gap-3 hover:bg-base-200 transition-all duration-200 rounded-lg p-2">
                <i class="fas fa-leaf text-success text-lg"></i>
                <span class="font-medium text-base-content">Garden</span>
                <div
                    class="ml-auto w-5 h-5 rounded-full bg-gradient-to-r from-success to-success-content border-2 border-success shadow-sm">
                </div>
            </a>
        </li>

        <!-- Forest Theme -->
        <li>
            <a @click="currentTheme = 'forest'; localStorage.setItem('theme', 'forest'); document.documentElement.setAttribute('data-theme', 'forest'); window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: 'forest' } }))"
                class="flex items-center gap-3 hover:bg-base-200 transition-all duration-200 rounded-lg p-2">
                <i class="fas fa-tree text-success text-lg"></i>
                <span class="font-medium text-base-content">Forest</span>
                <div
                    class="ml-auto w-5 h-5 rounded-full bg-gradient-to-r from-success to-success-content border-2 border-success shadow-sm">
                </div>
            </a>
        </li>

        <!-- Aqua Theme -->
        <li>
            <a @click="currentTheme = 'aqua'; localStorage.setItem('theme', 'aqua'); document.documentElement.setAttribute('data-theme', 'aqua'); window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: 'aqua' } }))"
                class="flex items-center gap-3 hover:bg-base-200 transition-all duration-200 rounded-lg p-2">
                <i class="fas fa-water text-blue-500 text-lg"></i>
                <span class="font-medium">Aqua</span>
                <div
                    class="ml-auto w-5 h-5 rounded-full bg-gradient-to-r from-blue-300 to-cyan-400 border-2 border-blue-300 shadow-sm">
                </div>
            </a>
        </li>

        <!-- Lofi Theme -->
        <li>
            <a @click="currentTheme = 'lofi'; localStorage.setItem('theme', 'lofi'); document.documentElement.setAttribute('data-theme', 'lofi'); window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: 'lofi' } }))"
                class="flex items-center gap-3 hover:bg-base-200 transition-all duration-200 rounded-lg p-2">
                <i class="fas fa-music text-gray-600 text-lg"></i>
                <span class="font-medium">Lofi</span>
                <div
                    class="ml-auto w-5 h-5 rounded-full bg-gradient-to-r from-gray-200 to-gray-400 border-2 border-gray-300 shadow-sm">
                </div>
            </a>
        </li>
    </ul>
</div>
