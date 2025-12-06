// إصلاح مشكلة مؤشر الكتابة في لوحة التحكم
document.addEventListener('DOMContentLoaded', function() {
    // منع مؤشر الكتابة في كل مكان
    function preventCursor(event) {
        if (!['INPUT', 'TEXTAREA', 'SELECT'].includes(event.target.tagName) && 
            !event.target.hasAttribute('contenteditable') || 
            event.target.getAttribute('contenteditable') !== 'true') {
            event.target.style.cursor = 'default';
            event.target.style.caretColor = 'transparent';
            event.target.style.userSelect = 'none';
        }
    }

    // تطبيق الإصلاح عند النقر
    document.addEventListener('click', preventCursor, true);

    // تطبيق الإصلاح عند التركيز
    document.addEventListener('focus', preventCursor, true);

    // تطبيق الإصلاح عند التمرير بالماوس
    document.addEventListener('mouseover', preventCursor, true);

    // تطبيق الإصلاح على جميع العناصر الحالية
    const allElements = document.querySelectorAll('*');
    allElements.forEach(element => {
        if (!['INPUT', 'TEXTAREA', 'SELECT'].includes(element.tagName) && 
            (!element.hasAttribute('contenteditable') || 
            element.getAttribute('contenteditable') !== 'true')) {
            element.style.cursor = 'default';
            element.style.caretColor = 'transparent';
            element.style.userSelect = 'none';
        }
    });

    // مراقبة التغييرات في DOM
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.addedNodes.length) {
                mutation.addedNodes.forEach(function(node) {
                    if (node.nodeType === 1) { // عناصر DOM فقط
                        if (!['INPUT', 'TEXTAREA', 'SELECT'].includes(node.tagName) && 
                            (!node.hasAttribute('contenteditable') || 
                            node.getAttribute('contenteditable') !== 'true')) {
                            node.style.cursor = 'default';
                            node.style.caretColor = 'transparent';
                            node.style.userSelect = 'none';
                        }

                        // تطبيق الإصلاح على العناصر الفرعية
                        const childElements = node.querySelectorAll('*');
                        childElements.forEach(function(child) {
                            if (!['INPUT', 'TEXTAREA', 'SELECT'].includes(child.tagName) && 
                                (!child.hasAttribute('contenteditable') || 
                                child.getAttribute('contenteditable') !== 'true')) {
                                child.style.cursor = 'default';
                                child.style.caretColor = 'transparent';
                                child.style.userSelect = 'none';
                            }
                        });
                    }
                });
            }
        });
    });

    // بدء مراقبة التغييرات في DOM
    observer.observe(document.body, { childList: true, subtree: true });

    // منع السلوك الافتراضي عند النقر على النصوص
    document.addEventListener('mousedown', function(event) {
        if (!['INPUT', 'TEXTAREA', 'SELECT'].includes(event.target.tagName) && 
            (!event.target.hasAttribute('contenteditable') || 
            event.target.getAttribute('contenteditable') !== 'true')) {
            event.preventDefault();
        }
    }, true);

    // منع تحديد النص عند النقر المزدوج
    document.addEventListener('selectstart', function(event) {
        if (!['INPUT', 'TEXTAREA', 'SELECT'].includes(event.target.tagName) && 
            (!event.target.hasAttribute('contenteditable') || 
            event.target.getAttribute('contenteditable') !== 'true')) {
            event.preventDefault();
        }
    }, true);
});
