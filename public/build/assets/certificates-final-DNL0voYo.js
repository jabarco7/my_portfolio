document.addEventListener("DOMContentLoaded",function(){const t=document.querySelectorAll(".certificate-filter-btn"),c=document.querySelectorAll(".certificate-card");t.forEach(e=>{e.addEventListener("click",()=>{const a=e.getAttribute("data-filter");t.forEach(s=>{s.classList.remove("active","bg-gradient-to-r","from-primary-500","to-secondary-500","text-white"),s.classList.add("bg-base-200","border","border-base-300","text-base-content")}),e.classList.add("active","bg-gradient-to-r","from-primary-500","to-secondary-500","text-white"),e.classList.remove("bg-base-200","border","border-base-300","text-base-content"),c.forEach(s=>{s.style.display="none",s.classList.remove("visible"),(a==="all"||s.getAttribute("data-category")===a)&&setTimeout(()=>{s.style.display="block",setTimeout(()=>{s.classList.add("visible")},50)},50)});const i=document.getElementById("no-results");i&&a!=="all"&&i.classList.add("hidden")})});const d=document.getElementById("certificate-search");d&&d.addEventListener("input",function(){const e=this.value.toLowerCase();let a=0;c.forEach(s=>{const n=s.dataset.title,l=s.dataset.issuer,r=s.dataset.category;n.includes(e)||l.includes(e)||r.includes(e)?(s.style.display="block",a++):s.style.display="none"});const i=document.getElementById("no-results");i&&(a===0?i.classList.remove("hidden"):i.classList.add("hidden"))}),document.querySelectorAll(".certificate-share-btn").forEach(e=>{e.addEventListener("click",function(){this.dataset.certificate,v()})});const o=document.querySelectorAll(".certificate-detail-btn");document.getElementById("certificate-modal"),document.getElementById("certificate-modal-content"),o.forEach(e=>{e.addEventListener("click",()=>{const a=e.getAttribute("data-certificate");if(a){const i=JSON.parse(a);f(i)}else{const i=e.getAttribute("data-certificate-id");i?(console.log("Navigating to certificate detail page:",i),window.location.href=`/certificate/${i}`):(console.error("No certificate ID found"),alert("Certificate details not available"))}})}),document.querySelectorAll(".certificate-card h3").forEach(e=>{e.style.cursor="pointer",e.addEventListener("click",()=>{const a=e.closest(".certificate-card"),i=JSON.parse(a.querySelector(".certificate-detail-btn").getAttribute("data-certificate"));m(i.id)})}),setTimeout(()=>{c.forEach(e=>{e.classList.add("visible")})},100)});function f(t){const c=document.getElementById("certificate-modal"),d=document.getElementById("certificate-modal-content");d.innerHTML=`
        <div class="space-y-6">
            <!-- Certificate Header -->
            <div class="bg-gradient-to-br ${t.color} rounded-2xl p-8 text-white">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center">
                        <i class="${t.icon} text-3xl"></i>
                    </div>
                    <div>
                        <div class="text-sm font-medium opacity-90 mb-2">${t.issuer}</div>
                        <h4 class="text-2xl font-bold">${t.title}</h4>
                    </div>
                </div>
            </div>

            <!-- Certificate Details -->
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <div class="text-sm text-base-content/60 mb-2">Credential ID</div>
                        <div class="font-mono font-semibold text-base-content">${t.id}</div>
                    </div>
                    <div>
                        <div class="text-sm text-base-content/60 mb-2">Date Issued</div>
                        <div class="font-semibold text-base-content">${t.date}</div>
                    </div>
                    <div>
                        <div class="text-sm text-base-content/60 mb-2">Category</div>
                        <div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-base-200 text-base-content/70">
                                ${t.category.charAt(0).toUpperCase()+t.category.slice(1)}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <div class="text-sm text-base-content/60 mb-2">Verification Status</div>
                        <div class="flex items-center gap-2">
                            ${t.verified?'<div class="w-3 h-3 rounded-full bg-green-500 animate-pulse"></div><span class="text-green-600 dark:text-green-400 font-semibold">✓ Verified Credential</span>':'<div class="w-3 h-3 rounded-full bg-yellow-500"></div><span class="text-yellow-600 font-semibold">Pending Verification</span>'}
                        </div>
                    </div>
                    <div>
                        <div class="text-sm text-base-content/60 mb-2">Description</div>
                        <div class="text-base-content/80">${t.description}</div>
                    </div>
                </div>
            </div>
        </div>
    `,c.classList.remove("hidden"),document.body.style.overflow="hidden"}function v(t){const c=document.getElementById("share-modal");c&&(c.classList.remove("hidden"),document.body.style.overflow="hidden")}function m(t){window.location.href=`/certificate/${t}`}
