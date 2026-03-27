document.addEventListener("DOMContentLoaded",function(){const a=document.getElementById("load-more-certificates"),n=document.getElementById("certificates-container");let l=10,d="all";a&&a.addEventListener("click",()=>{a.innerHTML=`
                <i class="fas fa-spinner fa-spin"></i>
                <span>Loading...</span>
            `,a.disabled=!0;const e=document.querySelector(".certificate-filter-btn.active");e&&(d=e.getAttribute("data-filter")),fetch(`/certificates/load-more?offset=${l}&category=${d}`).then(s=>s.json()).then(s=>{s.certificates.length>0&&(s.certificates.forEach(i=>{const r=o(i);n.appendChild(r)}),l+=10,setTimeout(()=>{n.querySelectorAll(".certificate-card:not(.visible)").forEach(r=>{r.classList.add("visible")})},100)),s.hasMore?(a.innerHTML=`
                        <i class="fas fa-sync-alt"></i>
                        <span>Load More Certificates</span>
                    `,a.disabled=!1):a.style.display="none"}).catch(s=>{console.error("Error loading certificates:",s),a.innerHTML=`
                        <i class="fas fa-sync-alt"></i>
                        <span>Load More Certificates</span>
                    `,a.disabled=!1,alert("Failed to load more certificates. Please try again.")})});function o(e){const s=document.createElement("div");s.className="certificate-card group",s.setAttribute("data-category",e.category?e.category.slug:"general"),s.setAttribute("data-title",e.title.toLowerCase()),s.setAttribute("data-issuer",(e.issuer||"").toLowerCase());let i="",r="";const t=e.category?e.category.color:null;e.category?t?t.startsWith("#")||t.startsWith("rgb")||t.startsWith("hsl")?r=`background: linear-gradient(135deg, ${t}, ${t})`:t.includes("gradient")?r=`background: ${t}`:t.startsWith("bg-")||t.startsWith("from-")?t.startsWith("from-")?i="bg-gradient-to-br "+t:i=t:r=`background: linear-gradient(135deg, ${t}, ${t})`:i="bg-gradient-to-br from-blue-500 to-indigo-600":i="bg-gradient-to-br from-gray-500 to-gray-600";const c=new Date(e.date).toLocaleDateString("en-US",{month:"short",year:"numeric"});return s.innerHTML=`
            <div class="bg-base-100 rounded-2xl border border-base-300 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden h-full flex flex-col">
                <div class="relative p-6 ${i} text-white" style="${r}">
                    <div class="absolute top-4 right-4">
                        <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center">
                            <i class="fas fa-certificate text-2xl"></i>
                        </div>
                    </div>
                    <div class="pr-12">
                        <div class="text-sm font-medium opacity-90 mb-2">${e.issuer||"Certificate Issuer"}</div>
                        <h3 class="text-xl font-bold">${e.title}</h3>
                    </div>
                </div>

                <div class="p-6 flex-grow">
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-sm text-base-content/60 mb-1">Date Issued</div>
                                <div class="font-semibold text-base-content">${c}</div>
                            </div>
                            <div>
                                <div class="text-sm text-base-content/60 mb-1">Credential ID</div>
                                <div class="font-semibold text-base-content font-mono text-sm">#${e.id}</div>
                            </div>
                        </div>

                        ${e.score?`
                        <div>
                            <div class="text-sm text-base-content/60 mb-1">Score / Level</div>
                            <div class="font-semibold text-base-content">${e.score}</div>
                        </div>
                        `:""}

                        ${e.description?`
                        <div>
                            <div class="text-sm text-base-content/60 mb-1">Description</div>
                            <div class="text-sm text-base-content/70 line-clamp-3">${e.description.substring(0,100)}${e.description.length>100?"...":""}</div>
                        </div>
                        `:""}

                        <div class="pt-4 border-t border-base-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                                    <span class="text-sm text-green-600 dark:text-green-400">Verified</span>
                                </div>
                                <span class="text-xs px-3 py-1 rounded-full bg-base-200 text-base-content/70">
                                    ${e.category?e.category.name.charAt(0).toUpperCase()+e.category.name.slice(1):"General"}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 pt-0">
                    <div class="flex gap-3">
                        ${e.certificate_url?`
                        <a href="${e.certificate_url}" target="_blank" class="group/view flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-primary/10 text-primary font-medium rounded-lg hover:bg-primary/20 transition-all duration-300">
                            <i class="fas fa-external-link-alt"></i>
                            <span>View Credential</span>
                        </a>
                        `:`
                        <a href="/certificate/${e.id}" class="group/view flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-primary/10 text-primary font-medium rounded-lg hover:bg-primary/20 transition-all duration-300">
                            <i class="fas fa-info-circle"></i>
                            <span>View Details</span>
                        </a>
                        `}
                    </div>
                </div>
            </div>
        `,s}});
