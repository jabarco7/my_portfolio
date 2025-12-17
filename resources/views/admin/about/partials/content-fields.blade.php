@if($section_type === 'hero')
    <!-- Hero Section Fields -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="badge_text" class="form-control-label">Badge Text</label>
                <input type="text" name="content_data[badge_text]" id="badge_text" class="form-control"
                    value="{{ old('content_data.badge_text') ?? '' }}" placeholder="e.g. About Me">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name" class="form-control-label">Name</label>
                <input type="text" name="content_data[name]" id="name" class="form-control"
                    value="{{ old('content_data.name') ?? '' }}" placeholder="Your Name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="heading_line1" class="form-control-label">Heading Line 1</label>
                <input type="text" name="content_data[heading_line1]" id="heading_line1" class="form-control"
                    value="{{ old('content_data.heading_line1') ?? '' }}" placeholder="e.g. My Journey as a">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="heading_line2" class="form-control-label">Heading Line 2</label>
                <input type="text" name="content_data[heading_line2]" id="heading_line2" class="form-control"
                    value="{{ old('content_data.heading_line2') ?? '' }}" placeholder="e.g. Web Developer">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="experience_years" class="form-control-label">Experience Years</label>
                <input type="number" name="content_data[experience_years]" id="experience_years" class="form-control"
                    value="{{ old('content_data.experience_years') ?? '' }}" min="0">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="profile_image" class="form-control-label">Profile Image URL</label>
                <input type="text" name="content_data[profile_image]" id="profile_image" class="form-control"
                    value="{{ old('content_data.profile_image') ?? '' }}" placeholder="Path to profile image">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="projects_count" class="form-control-label">Projects Count</label>
                <input type="number" name="content_data[projects_count]" id="projects_count" class="form-control"
                    value="{{ old('content_data.projects_count') ?? '' }}" min="0">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="clients_count" class="form-control-label">Clients Count</label>
                <input type="number" name="content_data[clients_count]" id="clients_count" class="form-control"
                    value="{{ old('content_data.clients_count') ?? '' }}" min="0">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="satisfaction_rate" class="form-control-label">Satisfaction Rate (%)</label>
                <input type="number" name="content_data[satisfaction_rate]" id="satisfaction_rate" class="form-control"
                    value="{{ old('content_data.satisfaction_rate') ?? '' }}" min="0" max="100">
            </div>
        </div>
    </div>
@elseif($section_type === 'skills')
    <!-- Skills Section Fields -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="skills_title" class="form-control-label">Skills Title</label>
                <input type="text" name="content_data[skills_title]" id="skills_title" class="form-control"
                    value="{{ old('content_data.skills_title') ?? 'Skills' }}" placeholder="e.g. Technical Skills">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-control-label">Frontend Skills</label>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="content_data[frontend_skills][]" class="form-control mb-2"
                            value="{{ old('content_data.frontend_skills.0') ?? 'React.js' }}" placeholder="Skill name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="content_data[frontend_skills][]" class="form-control mb-2"
                            value="{{ old('content_data.frontend_skills.1') ?? 'Vue.js' }}" placeholder="Skill name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="content_data[frontend_skills][]" class="form-control mb-2"
                            value="{{ old('content_data.frontend_skills.2') ?? 'HTML5/CSS3' }}" placeholder="Skill name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="content_data[frontend_skills][]" class="form-control mb-2"
                            value="{{ old('content_data.frontend_skills.3') ?? 'JavaScript/ES6+' }}" placeholder="Skill name">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-control-label">Backend Skills</label>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="content_data[backend_skills][]" class="form-control mb-2"
                            value="{{ old('content_data.backend_skills.0') ?? 'Laravel' }}" placeholder="Skill name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="content_data[backend_skills][]" class="form-control mb-2"
                            value="{{ old('content_data.backend_skills.1') ?? 'Node.js' }}" placeholder="Skill name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="content_data[backend_skills][]" class="form-control mb-2"
                            value="{{ old('content_data.backend_skills.2') ?? 'PHP' }}" placeholder="Skill name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="content_data[backend_skills][]" class="form-control mb-2"
                            value="{{ old('content_data.backend_skills.3') ?? 'Python' }}" placeholder="Skill name">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-control-label">Tools & Technologies</label>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="content_data[tools_skills][]" class="form-control mb-2"
                            value="{{ old('content_data.tools_skills.0') ?? 'Git/GitHub' }}" placeholder="Skill name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="content_data[tools_skills][]" class="form-control mb-2"
                            value="{{ old('content_data.tools_skills.1') ?? 'Docker' }}" placeholder="Skill name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="content_data[tools_skills][]" class="form-control mb-2"
                            value="{{ old('content_data.tools_skills.2') ?? 'AWS' }}" placeholder="Skill name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="content_data[tools_skills][]" class="form-control mb-2"
                            value="{{ old('content_data.tools_skills.3') ?? 'Webpack' }}" placeholder="Skill name">
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif($section_type === 'experience')
    <!-- Experience Section Fields -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-control-label">Experience Items</label>
                <div id="experienceItems">
                    <div class="experience-item card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exp_title_0" class="form-control-label">Job Title</label>
                                        <input type="text" name="content_data[experience][0][title]" id="exp_title_0" class="form-control"
                                            value="{{ old('content_data.experience.0.title') ?? 'Senior Full Stack Developer' }}" placeholder="Job Title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exp_company_0" class="form-control-label">Company</label>
                                        <input type="text" name="content_data[experience][0][company]" id="exp_company_0" class="form-control"
                                            value="{{ old('content_data.experience.0.company') ?? 'Tech Solutions Inc.' }}" placeholder="Company Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exp_year_0" class="form-control-label">Duration</label>
                                        <input type="text" name="content_data[experience][0][year]" id="exp_year_0" class="form-control"
                                            value="{{ old('content_data.experience.0.year') ?? '2022 - Present' }}" placeholder="e.g. 2022 - Present">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exp_description_0" class="form-control-label">Description</label>
                                        <textarea name="content_data[experience][0][description]" id="exp_description_0" class="form-control"
                                            rows="3" placeholder="Job description">{{ old('content_data.experience.0.description') ?? 'Leading development of enterprise web applications using Laravel and Vue.js. Mentoring junior developers and implementing best practices.' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="experience-item card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exp_title_1" class="form-control-label">Job Title</label>
                                        <input type="text" name="content_data[experience][1][title]" id="exp_title_1" class="form-control"
                                            value="{{ old('content_data.experience.1.title') ?? 'Full Stack Developer' }}" placeholder="Job Title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exp_company_1" class="form-control-label">Company</label>
                                        <input type="text" name="content_data[experience][1][company]" id="exp_company_1" class="form-control"
                                            value="{{ old('content_data.experience.1.company') ?? 'Digital Innovations LLC' }}" placeholder="Company Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exp_year_1" class="form-control-label">Duration</label>
                                        <input type="text" name="content_data[experience][1][year]" id="exp_year_1" class="form-control"
                                            value="{{ old('content_data.experience.1.year') ?? '2020 - 2022' }}" placeholder="e.g. 2020 - 2022">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exp_description_1" class="form-control-label">Description</label>
                                        <textarea name="content_data[experience][1][description]" id="exp_description_1" class="form-control"
                                            rows="3" placeholder="Job description">{{ old('content_data.experience.1.description') ?? 'Developed and maintained multiple client projects. Implemented responsive designs and optimized application performance.' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="experience-item card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exp_title_2" class="form-control-label">Job Title</label>
                                        <input type="text" name="content_data[experience][2][title]" id="exp_title_2" class="form-control"
                                            value="{{ old('content_data.experience.2.title') ?? 'Frontend Developer' }}" placeholder="Job Title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exp_company_2" class="form-control-label">Company</label>
                                        <input type="text" name="content_data[experience][2][company]" id="exp_company_2" class="form-control"
                                            value="{{ old('content_data.experience.2.company') ?? 'Web Creators Agency' }}" placeholder="Company Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exp_year_2" class="form-control-label">Duration</label>
                                        <input type="text" name="content_data[experience][2][year]" id="exp_year_2" class="form-control"
                                            value="{{ old('content_data.experience.2.year') ?? '2018 - 2020' }}" placeholder="e.g. 2018 - 2020">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exp_description_2" class="form-control-label">Description</label>
                                        <textarea name="content_data[experience][2][description]" id="exp_description_2" class="form-control"
                                            rows="3" placeholder="Job description">{{ old('content_data.experience.2.description') ?? 'Created interactive user interfaces and collaborated with designers to implement pixel-perfect designs.' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="addExperienceItem">
                    <i class="fas fa-plus me-2"></i>Add Experience Item
                </button>
            </div>
        </div>
    </div>
@elseif($section_type === 'education')
    <!-- Education Section Fields -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-control-label">Education Items</label>
                <div id="educationItems">
                    <div class="education-item card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edu_title_0" class="form-control-label">Degree</label>
                                        <input type="text" name="content_data[education][0][title]" id="edu_title_0" class="form-control"
                                            value="{{ old('content_data.education.0.title') ?? 'Bachelor of Computer Science' }}" placeholder="Degree title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edu_institution_0" class="form-control-label">Institution</label>
                                        <input type="text" name="content_data[education][0][institution]" id="edu_institution_0" class="form-control"
                                            value="{{ old('content_data.education.0.institution') ?? 'University of Technology' }}" placeholder="Institution name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edu_year_0" class="form-control-label">Duration</label>
                                        <input type="text" name="content_data[education][0][year]" id="edu_year_0" class="form-control"
                                            value="{{ old('content_data.education.0.year') ?? '2016 - 2018' }}" placeholder="e.g. 2016 - 2018">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edu_description_0" class="form-control-label">Description</label>
                                        <textarea name="content_data[education][0][description]" id="edu_description_0" class="form-control"
                                            rows="3" placeholder="Education description">{{ old('content_data.education.0.description') ?? 'Graduated with honors. Focused on software engineering, web technologies, and human-computer interaction.' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="addEducationItem">
                    <i class="fas fa-plus me-2"></i>Add Education Item
                </button>
            </div>
        </div>
    </div>
@elseif($section_type === 'cta')
    <!-- Call to Action Section Fields -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="cta_heading" class="form-control-label">CTA Heading</label>
                <input type="text" name="content_data[cta_heading]" id="cta_heading" class="form-control"
                    value="{{ old('content_data.cta_heading') ?? 'Ready to Start Your Next Project?' }}" placeholder="Call to action heading">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="cta_description" class="form-control-label">CTA Description</label>
                <textarea name="content_data[cta_description]" id="cta_description" class="form-control"
                    rows="3" placeholder="Call to action description">{{ old('content_data.cta_description') ?? 'Let\'s collaborate to bring your ideas to life with cutting-edge web solutions.' }}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cta_button_text" class="form-control-label">Primary Button Text</label>
                <input type="text" name="content_data[cta_button_text]" id="cta_button_text" class="form-control"
                    value="{{ old('content_data.cta_button_text') ?? 'Contact Me' }}" placeholder="Button text">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cta_button_url" class="form-control-label">Primary Button URL</label>
                <input type="text" name="content_data[cta_button_url]" id="cta_button_url" class="form-control"
                    value="{{ old('content_data.cta_button_url') ?? '/contact' }}" placeholder="Button URL">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cta_secondary_text" class="form-control-label">Secondary Button Text</label>
                <input type="text" name="content_data[cta_secondary_text]" id="cta_secondary_text" class="form-control"
                    value="{{ old('content_data.cta_secondary_text') ?? 'Back to Home' }}" placeholder="Button text">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cta_secondary_url" class="form-control-label">Secondary Button URL</label>
                <input type="text" name="content_data[cta_secondary_url]" id="cta_secondary_url" class="form-control"
                    value="{{ old('content_data.cta_secondary_url') ?? '/' }}" placeholder="Button URL">
            </div>
        </div>
    </div>
@endif

@push('scripts')
    <script>
        // Add experience item functionality
        let experienceCount = 3;
        document.getElementById('addExperienceItem')?.addEventListener('click', function() {
            const container = document.getElementById('experienceItems');
            const newItem = document.createElement('div');
            newItem.className = 'experience-item card mb-3';
            newItem.innerHTML = `
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exp_title_${experienceCount}" class="form-control-label">Job Title</label>
                                <input type="text" name="content_data[experience][${experienceCount}][title]" id="exp_title_${experienceCount}" class="form-control"
                                    placeholder="Job Title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exp_company_${experienceCount}" class="form-control-label">Company</label>
                                <input type="text" name="content_data[experience][${experienceCount}][company]" id="exp_company_${experienceCount}" class="form-control"
                                    placeholder="Company Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exp_year_${experienceCount}" class="form-control-label">Duration</label>
                                <input type="text" name="content_data[experience][${experienceCount}][year]" id="exp_year_${experienceCount}" class="form-control"
                                    placeholder="e.g. 2022 - Present">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exp_description_${experienceCount}" class="form-control-label">Description</label>
                                <textarea name="content_data[experience][${experienceCount}][description]" id="exp_description_${experienceCount}" class="form-control"
                                    rows="3" placeholder="Job description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="this.closest('.experience-item').remove()">
                                <i class="fas fa-trash me-2"></i>Remove
                            </button>
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(newItem);
            experienceCount++;
        });
        
        // Add education item functionality
        let educationCount = 1;
        document.getElementById('addEducationItem')?.addEventListener('click', function() {
            const container = document.getElementById('educationItems');
            const newItem = document.createElement('div');
            newItem.className = 'education-item card mb-3';
            newItem.innerHTML = `
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edu_title_${educationCount}" class="form-control-label">Degree</label>
                                <input type="text" name="content_data[education][${educationCount}][title]" id="edu_title_${educationCount}" class="form-control"
                                    placeholder="Degree title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edu_institution_${educationCount}" class="form-control-label">Institution</label>
                                <input type="text" name="content_data[education][${educationCount}][institution]" id="edu_institution_${educationCount}" class="form-control"
                                    placeholder="Institution name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edu_year_${educationCount}" class="form-control-label">Duration</label>
                                <input type="text" name="content_data[education][${educationCount}][year]" id="edu_year_${educationCount}" class="form-control"
                                    placeholder="e.g. 2016 - 2018">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="edu_description_${educationCount}" class="form-control-label">Description</label>
                                <textarea name="content_data[education][${educationCount}][description]" id="edu_description_${educationCount}" class="form-control"
                                    rows="3" placeholder="Education description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="this.closest('.education-item').remove()">
                                <i class="fas fa-trash me-2"></i>Remove
                            </button>
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(newItem);
            educationCount++;
        });
    </script>
@endpush old('content_data.cta_description') ?? 'Let's collaborate to bring your ideas to life with cutting-edge web solutions.' }}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cta_button_text" class="form-control-label">Button Text</label>
                <input type="text" name="content_data[cta_button_text]" id="cta_button_text" class="form-control"
                    value="{{ old('content_data.cta_button_text') ?? 'Contact Me' }}" placeholder="Button text">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cta_button_link" class="form-control-label">Button Link</label>
                <input type="text" name="content_data[cta_button_link]" id="cta_button_link" class="form-control"
                    value="{{ old('content_data.cta_button_link') ?? '/contact' }}" placeholder="Button link (e.g. /contact)">
            </div>
        </div>
    </div>
@elseif($section_type === 'social')
    <!-- Social Media Section Fields -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="social_heading" class="form-control-label">Social Section Heading</label>
                <input type="text" name="content_data[social_heading]" id="social_heading" class="form-control"
                    value="{{ old('content_data.social_heading') ?? 'Connect With Me' }}" placeholder="Social section heading">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="social_description" class="form-control-label">Social Section Description</label>
                <textarea name="content_data[social_description]" id="social_description" class="form-control"
                    rows="3" placeholder="Social section description">{{ old('content_data.social_description') ?? 'Let's connect and build something amazing together!' }}</textarea>
            </div>
        </div>
    </div>
@endifexp_description_0" class="form-control-label">Description</label>
                                        <textarea name="content_data[experience][0][description]" id="exp_description_0" class="form-control"
                                            rows="3" placeholder="Job description">{{ old('content_data.experience.0.description') ?? 'Leading development of enterprise web applications using Laravel and Vue.js. Mentoring junior developers and implementing best practices.' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" id="addExperienceItem" class="btn btn-sm btn-primary mt-2">
                    <i class="fas fa-plus me-1"></i> Add Experience
                </button>
            </div>
        </div>
    </div>
@elseif($section_type === 'education')
    <!-- Education Section Fields -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-control-label">Education Items</label>
                <div id="educationItems">
                    <div class="education-item card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edu_title_0" class="form-control-label">Degree</label>
                                        <input type="text" name="content_data[education][0][title]" id="edu_title_0" class="form-control"
                                            value="{{ old('content_data.education.0.title') ?? 'Bachelor of Computer Science' }}" placeholder="Degree Title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edu_institution_0" class="form-control-label">Institution</label>
                                        <input type="text" name="content_data[education][0][institution]" id="edu_institution_0" class="form-control"
                                            value="{{ old('content_data.education.0.institution') ?? 'University of Technology' }}" placeholder="Institution Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edu_year_0" class="form-control-label">Duration</label>
                                        <input type="text" name="content_data[education][0][year]" id="edu_year_0" class="form-control"
                                            value="{{ old('content_data.education.0.year') ?? '2016 - 2018' }}" placeholder="e.g. 2016 - 2018">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edu_description_0" class="form-control-label">Description</label>
                                        <textarea name="content_data[education][0][description]" id="edu_description_0" class="form-control"
                                            rows="3" placeholder="Education description">{{ old('content_data.education.0.description') ?? 'Graduated with honors. Focused on software engineering, web technologies, and human-computer interaction.' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" id="addEducationItem" class="btn btn-sm btn-primary mt-2">
                    <i class="fas fa-plus me-1"></i> Add Education
                </button>
            </div>
        </div>
    </div>
@elseif($section_type === 'social')
    <!-- Social Media Section Fields -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="social_title" class="form-control-label">Section Title</label>
                <input type="text" name="content_data[social_title]" id="social_title" class="form-control"
                    value="{{ old('content_data.social_title') ?? 'Connect With Me' }}" placeholder="e.g. Connect With Me">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="social_description" class="form-control-label">Section Description</label>
                <textarea name="content_data[social_description]" id="social_description" class="form-control"
                    rows="3" placeholder="Section description">{{ old('content_data.social_description') ?? 'Let\'s connect and build something amazing together!' }}</textarea>
            </div>
        </div>
    </div>
@elseif($section_type === 'cta')
    <!-- Call to Action Section Fields -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="cta_title" class="form-control-label">CTA Title</label>
                <input type="text" name="content_data[cta_title]" id="cta_title" class="form-control"
                    value="{{ old('content_data.cta_title') ?? 'Ready to Start Your Next Project?' }}" placeholder="e.g. Ready to Start Your Next Project?">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="cta_description" class="form-control-label">CTA Description</label>
                <textarea name="content_data[cta_description]" id="cta_description" class="form-control"
                    rows="3" placeholder="CTA description">{{ old('content_data.cta_description') ?? 'Let\'s collaborate to bring your ideas to life with cutting-edge web solutions.' }}</textarea>
            </div>
        </div>
    </div>
@endif

@push('scripts')
    <script>
        // Experience Items Management
        let experienceItemCount = 1;
        document.getElementById('addExperienceItem')?.addEventListener('click', function() {
            const experienceItems = document.getElementById('experienceItems');
            const newItem = document.createElement('div');
            newItem.className = 'experience-item card mb-3';
            newItem.innerHTML = `
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exp_title_${experienceItemCount}" class="form-control-label">Job Title</label>
                                <input type="text" name="content_data[experience][${experienceItemCount}][title]" id="exp_title_${experienceItemCount}" class="form-control"
                                    placeholder="Job Title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exp_company_${experienceItemCount}" class="form-control-label">Company</label>
                                <input type="text" name="content_data[experience][${experienceItemCount}][company]" id="exp_company_${experienceItemCount}" class="form-control"
                                    placeholder="Company Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exp_year_${experienceItemCount}" class="form-control-label">Duration</label>
                                <input type="text" name="content_data[experience][${experienceItemCount}][year]" id="exp_year_${experienceItemCount}" class="form-control"
                                    placeholder="e.g. 2022 - Present">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exp_description_${experienceItemCount}" class="form-control-label">Description</label>
                                <textarea name="content_data[experience][${experienceItemCount}][description]" id="exp_description_${experienceItemCount}" class="form-control"
                                    rows="3" placeholder="Job description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-danger remove-experience-item">
                                <i class="fas fa-trash me-1"></i> Remove
                            </button>
                        </div>
                    </div>
                </div>
            `;
            experienceItems.appendChild(newItem);
            experienceItemCount++;
        });
        
        // Remove Experience Item
        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-experience-item')) {
                e.target.closest('.experience-item').remove();
            }
        });
        
        // Education Items Management
        let educationItemCount = 1;
        document.getElementById('addEducationItem')?.addEventListener('click', function() {
            const educationItems = document.getElementById('educationItems');
            const newItem = document.createElement('div');
            newItem.className = 'education-item card mb-3';
            newItem.innerHTML = `
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edu_title_${educationItemCount}" class="form-control-label">Degree</label>
                                <input type="text" name="content_data[education][${educationItemCount}][title]" id="edu_title_${educationItemCount}" class="form-control"
                                    placeholder="Degree Title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edu_institution_${educationItemCount}" class="form-control-label">Institution</label>
                                <input type="text" name="content_data[education][${educationItemCount}][institution]" id="edu_institution_${educationItemCount}" class="form-control"
                                    placeholder="Institution Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edu_year_${educationItemCount}" class="form-control-label">Duration</label>
                                <input type="text" name="content_data[education][${educationItemCount}][year]" id="edu_year_${educationItemCount}" class="form-control"
                                    placeholder="e.g. 2016 - 2018">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="edu_description_${educationItemCount}" class="form-control-label">Description</label>
                                <textarea name="content_data[education][${educationItemCount}][description]" id="edu_description_${educationItemCount}" class="form-control"
                                    rows="3" placeholder="Education description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-danger remove-education-item">
                                <i class="fas fa-trash me-1"></i> Remove
                            </button>
                        </div>
                    </div>
                </div>
            `;
            educationItems.appendChild(newItem);
            educationItemCount++;
        });
        
        // Remove Education Item
        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-education-item')) {
                e.target.closest('.education-item').remove();
            }
        });
    </script>
@endpush