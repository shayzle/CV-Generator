<!DOCTYPE html>
<html lang="en">
<head>     
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="description" content="This is a cv generator site that created by HTML, CSS, JavaScript and PHP. This is a part of a school project from Epitech School. Built by Shanisya Lahida">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume CV</title>
    <link href="./css/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
<body>



    <!-- OPENING -->
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-3" src="./assets/layers.svg" alt="" width="82" height="67">
            <h1 class="h1 mb-4">CAREERCV</h1>
            <h2 class="h2 mb-3">This is a CV Generator. It helps you to create your own cv by generating informations that you put in the forms.</h5>
        </div>
    </main>



    <!-- MY WHOLE SECTION -->
    <section id="about-sc" class="container-fluid py-4" style="padding: 30px;">
        <div class="row gx-4 align-items-stretch" style="page-break-before: never; page-break-after: never; page-break-inside: avoid;"> 



        <!-- CV FORM -->
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm h-100">
                <div class="card-body overflow-auto" style="max-height: 85vh;">
                    <form action="./export.php" method="POST" enctype="multipart/form-data" id="cv-form" class="cv-forms">
                    <div class="cv-form-blk">
                        <div class="cv-form-row-title">
                            <h3>About Section</h3>
                        </div>
                        <div class="cv-form-row cv-form-row-about">
                            <div class="cols-3">
                                <div class="form-elem">
                                    <label for="firstname1" class="form-label">First Name</label>
                                    <input name="firstname" type="text" class="form-control firstname" id="firstname1" onkeyup="generateCV()" placeholder="e.g. John">
                                    <span class="form-text"></span>
                                </div>
                                <div class="form-elem">
                                    <label for="middlename1" class="form-label">Middle Name <span class="opt-text">(optional)</span> </label>
                                    <input name="middlename" type="text" class="form-control middlename" id="middlename1" onkeyup="generateCV()" placeholder="e.g. Winston">
                                    <span class="form-text"></span>
                                </div>
                                <div class="form-elem">
                                    <label for="lastname1" class="form-label">Last Name</label>
                                    <input name="lastname" type="text" class="form-control lastname" id="lastname1" onkeyup="generateCV()" placeholder="e.g. Lennon">
                                    <span class="form-text"></span>
                                </div>
                            </div>

                            <div class="cols-3">
                                <div class="form-elem">
                                    <label for="image_input" class="form-label">Your Image</label>
                                    <input name="image" type="file" class="form-control image" id="image_input" accept="image/jpeg,image/png" onchange="previewImage()">
                                </div>
                                <div class="form-elem">
                                    <label for="designation1" class="form-label">Designation</label>
                                    <input name="designation" type="text" class="form-control designation" id="designation1" onkeyup="generateCV()" placeholder="e.g. Web Developer">
                                    <span class="form-text"></span>
                                </div>
                                <div class="form-elem">
                                    <label for="address1" class="form-label">Address</label>
                                    <input name="address" type="text" class="form-control address" id="address1" onkeyup="generateCV()" placeholder="e.g. Paris, France">
                                    <span class="form-text"></span>
                                </div>
                            </div>

                            <div class="cols-3">
                                <div class="form-elem">
                                    <label for="email1" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control email" id="email1" onkeyup="generateCV()" placeholder="e.g. @johnlennon@example.com">
                                    <span class="form-text"></span>
                                </div>
                                <div class="form-elem">
                                    <label for="phonenumber1" class="form-label">Phone Number</label>
                                    <input name="phonenumber" type="text" class="form-control phonenumber" id="phonenumber1" onkeyup="generateCV()" placeholder="e.g. +33 6 80 77 xx">
                                    <span class="form-text"></span>
                                </div>
                                <div class="form-elem">
                                    <label for="summary1" class="form-label">Summary</label>
                                    <input name="summary" type="text" class="form-control summary" id="summary1" onkeyup="generateCV()" placeholder="e.g. Summary...">
                                    <span class="form-text"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cv-form-blk">
                        <div class="cv-form-row-title">
                            <h3>achievements</h3>
                        </div>
                        <div class="row-separator repeater">
                            <div class="repeater" data-repeater-list="group-a">
                                <div data-repeater-item>
                                    <div class="cv-form-row cv-form-row-achievement">
                                        <div class="cols-3">
                                            <div class="form-elem">
                                                <label for="achieve_title1" class="form-label">Title</label>
                                                <input name="achieve_title" type="text" class="form-control achieve_title" id="achieve_title1" onkeyup="generateCV()" placeholder="e.g. @johnlennon@example.com">
                                                <span class="form-text"></span>
                                            </div>
                                            <div class="form-elem">
                                                <label for="achieve_description1" class="form-label">Description</label>
                                                <input name="achieve_description" type="text" class="form-control achieve_description" id="achieve_description1" onkeyup="generateCV()" placeholder="e.g. @johnlennon@example.com">
                                                <span class="form-text"></span>
                                            </div>
                                        </div>
                                        <button data-repeater-delete type="button" class="repeater-remove-btn">-</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" data-repeater-create value = "Add" class="repeater-add-btn">+</button>
                        </div>
                    </div>

                    <div class="cv-form-blk">
                        <div class="cv-form-row-title">
                            <h3>experience</h3>
                        </div>
                        <div class="row-separator repeater">
                            <div class="repeater" data-repeater-list="group-b">
                                <div data-repeater-item>
                                    <div class="cv-form-row cv-form-row-experience">
                                        <div class="cols-3">
                                            <div class="form-elem">
                                                <label for="exp_title1" class="form-label">Title</label>
                                                <input name="exp_title" type="text" class="form-control exp_title" id="exp_title1" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                            <div class="form-elem">
                                                <label for="exp_organization1" class="form-label">Company / Organization</label>
                                                <input name="exp_organization" type="text" class="form-control exp_organization" id="exp_organization1" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                            <div class="form-elem">
                                                <label for="exp_location1" class="form-label">Location</label>
                                                <input name="exp_location" type="text" class="form-control exp_location" id="exp_location1" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                        </div>

                                        <div class="cols-3">
                                            <div class="form-elem">
                                                <label for="exp_start_date1" class="form-label">Start Date</label>
                                                <input name="exp_start_date" type="date" class="form-control exp_start_date" id="exp_start_date1" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                            <div class="form-elem">
                                                <label for="exp_end_date1" class="form-label">End Date</label>
                                                <input name="exp_end_date" type="date" class="form-control exp_end_date" id="exp_end_date1" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                            <div class="form-elem">
                                                <label for="exp_description1" class="form-label">Description</label>
                                                <input name="exp_description" type="text" class="form-control exp_description" id="exp_description1" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                        </div>

                                        <button data-repeater-delete type="button" class="repeater-remove-btn">-</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" data-repeater-create value = "Add" class="repeater-add-btn">+</button>
                        </div>
                    </div>

                    <div class="cv-form-blk">
                        <div class="cv-form-row-title">
                            <h3>education</h3>
                        </div>
                        <div class="row-separator repeater">
                            <div class="repeater" data-repeater-list="group-c">
                                <div data-repeater-item>
                                    <div class="cv-form-row cv-form-row-experience">
                                        <div class="cols-3">
                                            <div class="form-elem">
                                                <label for="edu_school1" class="form-label">School</label>
                                                <input name="edu_school" type="text" class="form-control edu_school" id="edu_school1" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                            <div class="form-elem">
                                                <label for="edu_degree1" class="form-label">Degree</label>
                                                <input name="edu_degree" type="text" class="form-control edu_degree" id="edu_degree1" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                            <div class="form-elem">
                                                <label for="edu_city1" class="form-label">City</label>
                                                <input name="edu_city" type="text" class="form-control edu_city" id="edu_city1" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                        </div>

                                        <div class="cols-3">
                                            <div class="form-elem">
                                                <label for="edu_start_date1" class="form-label">Start Date</label>
                                                <input name="edu_start_date" type="date" class="form-control edu_start_date" id="edu_start_date1" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                            <div class="form-elem">
                                                <label for="edu_graduation_date1" class="form-label">End Date</label>
                                                <input name="edu_graduation_date" type="date" class="form-control edu_graduation_date" id="edu_graduation_date1" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                            <div class="form-elem">
                                                <label for="edu_description1" class="form-label">Description</label>
                                                <input name="edu_description" type="text" class="form-control edu_description" id="edu_description1" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                        </div>

                                        <button data-repeater-delete type="button" class="repeater-remove-btn">-</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" data-repeater-create value = "Add" class="repeater-add-btn">+</button>
                        </div>
                    </div> 

                    <div class="cv-form-blk">
                        <div class="cv-form-row-title">
                            <h3>projects</h3>
                        </div>
                        <div class="row-separator repeater">
                            <div class="repeater" data-repeater-list="group-d">
                                <div data-repeater-item>
                                    <div class="cv-form-row cv-form-row-experience">
                                        <div class="cols-3">
                                            <div class="form-elem">
                                                <label for="proj_title1" class="form-label">Project Name</label>
                                                <input name="proj_title" type="text" class="form-control proj_title" id="proj_title1" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                            <div class="form-elem">
                                                <label for="proj_link1" class="form-label">Project Link</label>
                                                <input name="proj_link" type="text" class="form-control proj_link" id="proj_link1" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                            <div class="form-elem">
                                                <label for="proj_description1" class="form-label">Description</label>
                                                <input name="proj_description" type="text" class="form-control proj_description" id="proj_description1" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                        </div>

                                        <button data-repeater-delete type="button" class="repeater-remove-btn">-</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" data-repeater-create value = "Add" class="repeater-add-btn">+</button>
                        </div>
                    </div>

                    <div class="cv-form-blk">
                        <div class="cv-form-row-title">
                            <h3>skills</h3>
                        </div>
                        <div class="row-separator repeater">
                            <div class="repeater" data-repeater-list="group-e">
                                <div data-repeater-item>
                                    <div class="cv-form-row cv-form-row-skills">
                                        <div class="form-elem">
                                            <label for="skill1" class="form-label">Skills</label>
                                            <input name="skill" type="text" class="form-control skill" id="skill1" onkeyup="generateCV()">
                                            <span class="form-text"></span>
                                        </div>

                                        <button data-repeater-delete type="button" class="repeater-remove-btn">-</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" data-repeater-create value = "Add" class="repeater-add-btn">+</button>
                        </div>
                    </div>


                    <div class="text-center mt-4 mb-4">
                        <button type="submit" class="btn btn-success">
                            Download PDF
                        </button>
                    </div>


                    </form>
                </div>
            </div>
        </div>



    <!-- CV PREVIEW -->
    <div class="col-12 col-lg-6">
      <div class="card shadow-sm h-100">
        <div class="card-body print-area" style="max-height: 85vh; overflow:auto;">
 
          <!-- PREVIEW SECTION -->
        <section id="preview-sc" class="print-area">
            <div class="container">
                <div class="preview-cnt">
                <div class="preview-cnt-l bg-green text-white">
                <div class="preview-blk">
                    <div class="preview-image">
                        <img src="" alt="" id="image_dsp">
                    </div>
                    <div class="preview-item preview-item-name">
                        <span class="preview-item-val fw-6" id="fullname_dsp"></span>
                    </div>
                    <div class="preview-item">
                        <span class="preview-item-val text-uppercase fw-6 ls-1" id="designation_dsp"></span>
                    </div>
                </div>
                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>about</h3>
                    </div>
                    <div class="preview-blk-list">
                        <div class="preview-item">
                            <span class="preview-item-val" id="phonenumber_dsp"></span>
                        </div>
                        <div class="preview-item">
                            <span class="preview-item-val" id="email_dsp"></span>
                        </div>
                        <div class="preview-item">
                            <span class="preview-item-val" id="address_dsp"></span>
                        </div>
                        <div class="preview-item">
                            <span class="preview-item-val" id="summary_dsp"></span>
                        </div>
                    </div>
                </div>
                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>skills</h3>
                    </div>
                    <div class="skills-items preview-blk-list" id="skills_dsp"></div>
                </div>
            </div>

            <div class="preview-cnt-r bg-white">
                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>Achievements</h3>
                    </div>
                    <div class="achievements-items preview-blk-list" id="achievements_dsp"></div>
                </div>

                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>Educations</h3>
                    </div>
                    <div class="educations-items preview-blk-list" id="educations_dsp"></div>
                </div>

                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>Experiences</h3>
                    </div>
                    <div class="experiences-items preview-blk-list" id="experiences_dsp"></div>
                </div>

                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>Projects</h3>
                    </div>
                    <div class="projects-items preview-blk-list" id="projects_dsp"></div>
                </div>
            </div>
        </div>
    </div>
</section>


        </div>
      </div>
    </div>

    </div>

    </section>
    




    <section class="print-btn-sc">
        <div class="container">
            <button type="button" class="print-btn btn btn-primary" onclick="printCV()">Print CV</button>
        </div>
    </section>



    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- JQuery CDN -->
     <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- JQuery Repeater CDN -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js" integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <!-- Custom JavaScript -->
     <script src="./js/script.js"></script>
    <!-- App JavaScript -->
     <script src="./js/app.js"></script>
</body>
</html>