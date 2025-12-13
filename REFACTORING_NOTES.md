# Refactoring Notes

## 1. Architecture & Clean Code
- **Separation of Concerns**: Moved logic from `AdminController` (which was parsing Blade files with Regex - a very fragile approach) to dedicated Controllers (`ContentController`, `ServiceController`, `SocialLinkController`).
- **Database-Driven Content**: Introduced `Setting`, `Service`, `SocialLink`, and `Skill` models to store dynamic content in the database instead of hardcoding it in Blade views. This allows for easier management and scalability.
- **Form Requests**: Created dedicated Form Request classes (e.g., `ContentUpdateRequest`, `ServiceStoreRequest`) to handle validation logic, keeping controllers clean.

## 2. Security Improvements
- **Rate Limiting**: Applied `throttle` middleware to sensitive routes like Login (5 attempts/min) and Contact Form (3 attempts/min) to prevent brute-force and spam attacks.
- **CSRF Protection**: Updated `bootstrap.js` to automatically attach the CSRF token to Axios requests, and refactored `contact.js` to use Axios for secure AJAX submissions.
- **Input Validation**: Enforced strict validation rules in Form Requests to ensure data integrity and security.
- **XSS Prevention**: Ensured all dynamic content in Blade views is escaped using `{{ }}` syntax.

## 3. Routing
- **Resource Controllers**: Used Laravel's Resource Controllers for standard CRUD operations (Services, Social Links, Projects) to follow RESTful conventions.
- **Route Naming**: Consistently named routes (e.g., `admin.services.index`) for easier maintenance and refactoring.
- **Middleware**: Verified `AdminAuth` middleware protects all administrative routes.

## 4. Frontend
- **Dynamic Views**: Refactored `home.blade.php` to fetch data from the database, making the frontend truly dynamic and manageable via the Admin Panel.
- **JavaScript**: Modernized `contact.js` to use `axios` for better error handling and security integration.

## 5. Next Steps
- Run `php artisan migrate` to create the new tables.
- Seed the database with initial content (Hero section, Skills, etc.).
- Configure `.env` for production (Database, Mail, App Key).
