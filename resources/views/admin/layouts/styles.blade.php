<style>
    :root {
        --color-primary: #3b82f6;
        --color-primary-content: #ffffff;
        --color-base-100: #ffffff;
        --color-base-200: #f3f4f6;
        --color-base-300: #e5e7eb;
        --color-base-content: #111827;
    }

    [data-theme="dark"] {
        --color-primary: #3b82f6;
        --color-primary-content: #ffffff;
        --color-base-100: #1f2937;
        --color-base-200: #374151;
        --color-base-300: #4b5563;
        --color-base-content: #f9fafb;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--color-base-200);
        color: var(--color-base-content);
    }

    .sidebar {
        background-color: var(--color-base-100);
        border-right: 1px solid var(--color-base-300);
    }

    .main-content {
        background-color: var(--color-base-200);
    }

    .card {
        background-color: var(--color-base-100);
        border: 1px solid var(--color-base-300);
    }

    .nav-link {
        color: var(--color-base-content);
        transition: all 0.2s;
        text-decoration: none;
    }

    .nav-link:hover {
        background-color: var(--color-base-200);
        color: var(--color-primary);
        text-decoration: none;
    }

    .nav-link.active {
        background-color: var(--color-primary);
        color: var(--color-primary-content);
        text-decoration: none;
    }

    /* Dropdown styles */
    .dropdown {
        position: relative;
        margin-bottom: 1rem;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: var(--color-base-100);
        min-width: 100%;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1000;
        border-radius: 0.5rem;
        border: 1px solid var(--color-base-300);
        padding: 0.5rem 0;
        margin-top: 0.5rem;
        left: 0;
        width: 100%;
        max-height: 300px;
        overflow-y: auto;
    }

    .dropdown-item {
        color: var(--color-base-content);
        padding: 0.5rem 1rem 0.5rem 1.5rem;
        text-decoration: none;
        display: block;
        transition: all 0.2s;
    }

    .dropdown-item:hover {
        background-color: var(--color-base-200);
        color: var(--color-primary);
    }

    .dropdown-item.active {
        background-color: var(--color-primary);
        color: var(--color-primary-content);
    }

    details[open] .dropdown-menu {
        display: block;
    }

    summary {
        list-style: none;
        cursor: pointer;
        user-select: none;
    }

    summary::-webkit-details-marker {
        display: none;
    }

    .btn {
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-weight: 500;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background-color: var(--color-primary);
        color: var(--color-primary-content);
    }

    .btn-primary:hover {
        opacity: 0.9;
    }

    .btn-secondary {
        background-color: transparent;
        color: var(--color-base-content);
        border: 1px solid var(--color-base-300);
    }

    .btn-secondary:hover {
        background-color: var(--color-base-200);
    }

    .form-input {
        width: 100%;
        padding: 0.5rem 0.75rem;
        border: 1px solid var(--color-base-300);
        border-radius: 0.375rem;
        background-color: var(--color-base-100);
        color: var(--color-base-content);
    }

    .form-input:focus {
        outline: none;
        border-color: var(--color-primary);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--color-base-content);
    }

    .notification {
        padding: 1rem 1.5rem;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: opacity 0.3s ease-in-out;
        position: relative;
        display: flex;
        align-items: center;
    }

    .notification::before {
        margin-right: 0.75rem;
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        font-size: 1.25rem;
    }

    .notification-success {
        background-color: #10b981;
        color: white;
    }

    .notification-success::before {
        content: "058";
    }

    .notification-error {
        background-color: #ef4444;
        color: white;
    }

    .notification-error::before {
        content: "057";
    }

    /* Cursor fix for admin panel */
    * {
        cursor: default !important;
        caret-color: transparent !important;
        user-select: none !important;
        -webkit-user-select: none !important;
        -moz-user-select: none !important;
        -ms-user-select: none !important;
    }

    input,
    textarea,
    select,
    [contenteditable="true"] {
        cursor: text !important;
        caret-color: auto !important;
        user-select: text !important;
        -webkit-user-select: text !important;
        -moz-user-select: text !important;
        -ms-user-select: text !important;
    }

    button,
    a,
    .btn,
    .nav-link {
        cursor: pointer !important;
    }
</style>
