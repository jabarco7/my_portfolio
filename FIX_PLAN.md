# خطة إصلاح مشكلة زر "View Credential" في صفحة الشهادات

## المشكلة
عند الضغط على زر "View Credential" في صفحة الشهادات كان يظهر خطأ 404 Not Found.

## الأسباب المحتملة
1. زر "View Credential" كان يحاول توجيه المستخدم إلى رابط خارجي غير موجود أو فارغ
2. عدم وجود آلية بديلة للشهادات التي لا تحتوي على رابط خارجي
3. مشكلة في دالة JavaScript للتنقل إلى صفحة تفاصيل الشهادة

## الحلول المطبقة

### 1. تحديث ملف `resources/views/certificates.blade.php`
- تم تعديل منطق عرض زر "View Credential"
- إضافة شرط للتحقق من وجود رابط صحيح للشهادة
- إذا كان الرابط موجود وصالح: عرض زر "View Credential" يفتح الرابط الخارجي
- إذا لم يكن الرابط موجود أو غير صالح: عرض زر "View Details" يفتح صفحة تفاصيل الشهادة

```blade
@if(!empty($certificate->certificate_url) && filter_var($certificate->certificate_url, FILTER_VALIDATE_URL))
    <!-- زر View Credential للرابط الخارجي -->
@else
    <!-- زر View Details للصفحة الداخلية -->
@endif
```

### 2. تحديث ملف `resources/js/certificates.js`
- إضافة دالة `navigateToCertificateDetail(certificateId)` للتنقل إلى صفحة تفاصيل الشهادة
- تحديث استدعاء الدالة في عنوان الشهادة لاستخدام معرف الشهادة
- إضافة معالجة أخطاء مناسبة

```javascript
function navigateToCertificateDetail(certificateId) {
    try {
        if (certificateId) {
            window.location.href = `/certificate/${certificateId}`;
        } else {
            alert('Certificate details will be available soon!');
        }
    } catch (error) {
        console.error('Error navigating to certificate detail:', error);
        alert('Unable to load certificate details. Please try again later.');
    }
}
```

## النتائج المتوقعة
1. الشهادات التي تحتوي على رابط خارجي صالح ستظهر زر "View Credential" ويفتح الرابط في علامة تبويب جديدة
2. الشهادات التي لا تحتوي على رابط خارجي ستظهر زر "View Details" ويفتح صفحة تفاصيل الشهادة الداخلية
3. لن تظهر أخطاء 404 عند الضغط على الأزرار
4. تحسين تجربة المستخدم بوجود آلية بديلة واضحة

## الاختبارات المطلوبة
1. اختبار الشهادات التي تحتوي على رابط خارجي
2. اختبار الشهادات التي لا تحتوي على رابط خارجي
3. التأكد من عمل صفحة تفاصيل الشهادة بشكل صحيح
4. اختبار أزرار التصفية والتنقل في الصفحة

## حالة الإصلاح
✅ **مكتمل** - تم إصلاح المشكلة وتطبيق الحلول المذكورة أعلاه.

