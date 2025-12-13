# Security Checklist

## 1. Authentication & Authorization
- [x] **Admin Authentication**: Verified `AdminAuth` middleware protects all admin routes.
- [x] **Rate Limiting**: Applied `throttle:5,1` to login routes and `throttle:3,1` to contact form.
- [ ] **Password Policy**: Ensure strong password requirements in `AuthController` (not visible in provided code, but recommended).

## 2. Input Validation
- [x] **Form Requests**: Created `ContentUpdateRequest`, `ServiceStoreRequest`, `SocialLinkStoreRequest`, etc.
- [x] **Server-Side Validation**: All controllers use `validated()` data, never raw `request()->all()`.
- [x] **Sanitization**: Blade `{{ }}` automatically escapes output.

## 3. CSRF Protection
- [x] **Forms**: Ensure all Blade forms use `@csrf`.
- [x] **AJAX**: Updated `bootstrap.js` to include `X-CSRF-TOKEN` header for Axios.
- [x] **Contact Form**: Refactored `contact.js` to use Axios with CSRF token.

## 4. XSS Prevention
- [x] **Output Escaping**: Used `{{ $variable }}` in Blade views.
- [x] **Content Management**: Admin content is treated as plain text or safely escaped. Avoid `{!! !!}` unless using a sanitizer like HTMLPurifier.

## 5. Headers & Transport Security
- [ ] **HTTPS**: Ensure the application is deployed over HTTPS.
- [ ] **Secure Headers**: Configure `Nginx` or `Apache` to send security headers (HSTS, X-Frame-Options, X-Content-Type-Options).
- [ ] **Cookies**: Set `secure` and `http_only` flags for cookies in `config/session.php`.

## 6. Environment Configuration
- [ ] **APP_DEBUG**: Set `APP_DEBUG=false` in production.
- [ ] **APP_KEY**: Ensure a strong `APP_KEY` is generated.
- [ ] **Sensitive Data**: Never commit `.env` file.

## 7. File Uploads
- [ ] **Validation**: Ensure image uploads (if any) validate mime types and size. (ProjectController seems to handle images, verify validation there).
- [ ] **Storage**: Store files outside the public directory and use `storage:link`.

## 8. Logging & Monitoring
- [ ] **Log Level**: Set `LOG_LEVEL=error` or `warning` in production.
- [ ] **Monitoring**: Set up error tracking (e.g., Sentry) if possible.
