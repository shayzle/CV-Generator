// regex for validation 
const strRegex = /^[a-zA-Z\s]*$/;
// containing only letters 
const emailRegex = 
  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const phoneRegex = /^[+](\d{3})\)?(\d{3})(\d{5,6})$|^(\d{10,10})$/im;
// const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
/* supprts following number formats - (123)
456-7890, (123)456-7890, 123-456-7890, 123.
456-7890, 1234567890, +31636363634,
075-63546725
Chercher Phone Regex Français
*/
const digitRegex = /^\d+$/;

const mainForm = document.getElementById("cv-form");
// const mainForm = document.querySelectorAll('.needs-validation')
const validType = {
  TEXT: "text",
  TEXT_EMP: "text_emp",
  EMAIL: "email",
  DIGIT: "digit",
  PHONENUMBER: "phonenumber",
  ANY: "any",
};

// User Inputq Elements
let firstnameElem = mainForm.firstname,
  middlenameElem = mainForm.middlename,
  lastnameElem = mainForm.lastname,
  imageElem = mainForm.image,
  designationElem = mainForm.designation,
  addressElem = mainForm.address,
  emailElem = mainForm.email,
  phonenumberElem = mainForm.phonenumber,
  summaryElem = mainForm.summary;

// const imageInput = document.getElementById("image_input");
// const imageDsp = document.getElementById("image_dsp");

// Display Elemetns
let nameDsp = document.getElementById("fullname_dsp"),
  // imageDsp = document.getElementById('image_dsp'),
  // imageElem = document.getElementById("image_input"),
  imageDsp = document.getElementById("image_dsp"),
  phonenumberDsp = document.getElementById("phonenumber_dsp"),
  emailDsp = document.getElementById("email_dsp"),
  addressDsp = document.getElementById("address_dsp"),
  designationDsp = document.getElementById("designation_dsp"),
  summaryDsp = document.getElementById("summary_dsp"),
  projectDsp = document.getElementById("projects_dsp"),
  achievementsDsp = document.getElementById("achievements_dsp"),
  skillsDsp = document.getElementById("skills_dsp"),
  educationDsp = document.getElementById("educations_dsp"),
  experiencesDsp = document.getElementById("experiences_dsp");

// First value is for the attributes and secon one passes the nodelists
const fetchValues = (attrs, ...nodeLists) => {
  let elemsAttrsCount = nodeLists.length;
  let elemsDataCount = nodeLists[0].length;
  let tempDataArr = [];

  // first loop deals with the no of repeaters value
  for (let i = 0; i < elemsDataCount; i++) {
    let dataObj = {}; // creating an empty object to fill the data
    // second loop fetches the data for each repeaters value or attributes
    for (let j = 0; j < elemsAttrsCount; j++) {
      // setting the key name for the object and fill it with data
      dataObj[`${attrs[j]}`] = nodeLists[j][i].value;
    }
    tempDataArr.push(dataObj);
  }
  return tempDataArr;
};

const getUserInputs = () => {
  // achivements
  let achievementsTitleElem = document.querySelectorAll(".achieve_title"),
    achievementsDescriptionElem = document.querySelectorAll(
      ".achieve_description",
    );

  // experiences
  let expTitleElem = document.querySelectorAll(".exp_title"),
    expOrganizationElem = document.querySelectorAll(".exp_organization");
  ((expLocationElem = document.querySelectorAll(".exp_location")),
    (expStartDateElem = document.querySelectorAll(".exp_start_date")),
    (expEndDateElem = document.querySelectorAll(".exp_end_date")),
    (expDescriptionElem = document.querySelectorAll(".exp_description")));

  // education
  let eduSchoolElem = document.querySelectorAll(".edu_school"),
    eduDegreeElem = document.querySelectorAll(".edu_degree"),
    eduCityElem = document.querySelectorAll(".edu_city"),
    eduStartDateElem = document.querySelectorAll(".edu_start_date"),
    eduGraduationDateElem = document.querySelectorAll(".edu_graduation_date"),
    eduDescriptionElem = document.querySelectorAll(".edu_description");

  let projTitleElem = document.querySelectorAll(".proj_title"),
    projLinkElem = document.querySelectorAll(".proj_link"),
    projDescriptionElem = document.querySelectorAll(".proj_description");

  let skillElem = document.querySelectorAll(".skill");

  // Event Listeners for Form Validation
  firstnameElem.addEventListener("keyup", (e) =>
    validateFormData(e.target, validType.TEXT, "First Name"),
  );
  middlenameElem.addEventListener("keyup", (e) =>
    validateFormData(e.target, validType.TEXT_EMP, "Middle Name"),
  );
  lastnameElem.addEventListener("keyup", (e) =>
    validateFormData(e.target, validType.TEXT, "Last Name"),
  );
  phonenumberElem.addEventListener("keyup", (e) =>
    validateFormData(e.target, validType.PHONENUMBER, "Phone Number"),
  );
  emailElem.addEventListener("keyup", (e) =>
    validateFormData(e.target, validType.EMAIL, "Email"),
  );
  addressElem.addEventListener("keyup", (e) =>
    validateFormData(e.target, validType.ANY, "Address"),
  );
  designationElem.addEventListener("keyup", (e) =>
    validateFormData(e.target, validType.TEXT, "Designation"),
  );

  achievementsTitleElem.forEach((item) =>
    item.addEventListener("keyup", (e) =>
      validateFormData(e.target, validType.ANY, "Title"),
    ),
  );
  achievementsDescriptionElem.forEach((item) =>
    item.addEventListener("keyup", (e) =>
      validateFormData(e.target, validType.ANY, "Description"),
    ),
  );
  expTitleElem.forEach((item) =>
    item.addEventListener("keyup", (e) =>
      validateFormData(e.target, validType.ANY, "Title"),
    ),
  );
  expOrganizationElem.forEach((item) =>
    item.addEventListener("keyup", (e) =>
      validateFormData(e.target, validType.ANY, "Organization"),
    ),
  );
  expLocationElem.forEach((item) =>
    item.addEventListener("keyup", (e) =>
      validateFormData(e.target, validType.ANY, "Location"),
    ),
  );
  expStartDateElem.forEach((item) =>
    item.addEventListener("blur", (e) =>
      validateFormData(e.target, validType.ANY, "End Date"),
    ),
  );
  expEndDateElem.forEach((item) =>
    item.addEventListener("keyup", (e) =>
      validateFormData(e.target, validType.ANY, "End Date"),
    ),
  );
  expDescriptionElem.forEach((item) =>
    item.addEventListener("keyup", (e) =>
      validateFormData(e.target, validType.ANY, "Description"),
    ),
  );
  eduSchoolElem.forEach((item) =>
    item.addEventListener("keyup", (e) =>
      validateFormData(e.target, validType.ANY, "School"),
    ),
  );
  eduDegreeElem.forEach((item) =>
    item.addEventListener("keyup", (e) =>
      validateFormData(e.target, validType.ANY, "Degree"),
    ),
  );
  eduCityElem.forEach((item) =>
    item.addEventListener("keyup", (e) =>
      validateFormData(e.target, validType.ANY, "City"),
    ),
  );
  eduStartDateElem.forEach((item) =>
    item.addEventListener("blur", (e) =>
      validateFormData(e.target, validType.ANY, "Start Date"),
    ),
  );
  eduGraduationDateElem.forEach((item) =>
    item.addEventListener("blur", (e) =>
      validateFormData(e.target, validType.ANY, "Graduation Date"),
    ),
  );
  eduDescriptionElem.forEach((item) =>
    item.addEventListener("keyup", (e) =>
      validateFormData(e.target, validType.ANY, "Description"),
    ),
  );
  projTitleElem.forEach((item) =>
    item.addEventListener("keyup", (e) =>
      validateFormData(e.target, validType.ANY, "Title"),
    ),
  );
  projLinkElem.forEach((item) =>
    item.addEventListener("keyup", (e) =>
      validateFormData(e.target, validType.ANY, "Link"),
    ),
  );
  projDescriptionElem.forEach((item) =>
    item.addEventListener("keyup", (e) =>
      validateFormData(e.target, validType.ANY, "Description"),
    ),
  );
  skillElem.forEach((item) =>
    item.addEventListener("keyup", (e) =>
      validateFormData(e.target, validType.ANY, "Skill"),
    ),
  );

  return {
    firstname: firstnameElem.value,
    middlename: middlenameElem.value,
    lastname: lastnameElem.value,
    designation: designationElem.value,
    address: addressElem.value,
    email: emailElem.value,
    phonenumber: phonenumberElem.value,
    summary: summaryElem.value,
    achievements: fetchValues(
      ["achieve_title", "achieve_description"],
      achievementsTitleElem,
      achievementsDescriptionElem,
    ),
    experiences: fetchValues(
      [
        "exp_title",
        "exp_organization",
        "exp_location",
        "exp_start_date",
        "exp_end_date",
        "exp_description",
      ],
      expTitleElem,
      expOrganizationElem,
      expLocationElem,
      expStartDateElem,
      expEndDateElem,
      expDescriptionElem,
    ),
    educations: fetchValues(
      [
        "edu_school",
        "edu_degree",
        "edu_city",
        "edu_start_date",
        "edu_graduation_date",
        "edu_description",
      ],
      eduSchoolElem,
      eduDegreeElem,
      eduCityElem,
      eduStartDateElem,
      eduGraduationDateElem,
      eduDescriptionElem,
    ),
    projects: fetchValues(
      ["proj_title", "proj_link", "proj_description"],
      projTitleElem,
      projLinkElem,
      projDescriptionElem,
    ),
    skills: fetchValues(["skill"], skillElem),
  };
};

function validateFormData(elem, elemType, elemName) {
  // checking for text string and non empty string
  if (elemType == validType.TEXT) {
    if (!strRegex.test(elem.value) || elem.value.trim().length == 0)
      addErrMsg(elem, elemName);
    else removeErrMsg(elem);
  }

  // checking for only text string
  if (elemType == validType.TEXT_EMP) {
    if (!strRegex.test(elem.value)) addErrMsg(elem, elemName);
    else removeErrMsg(elem);
  }

  // checking for email
  if (elemType == validType.EMAIL) {
    if (!emailRegex.test(elem.value) || elem.value.trim().length == 0)
      addErrMsg(elem, elemName);
    else removeErrMsg(elem);
  }

  // checking for phone number
  if (elemType == validType.PHONENUMBER) {
    if (!phoneRegex.test(elem.value) || elem.value.trim().length == 0)
      addErrMsg(elem, elemName);
    else removeErrMsg(elem);
  }

  // checking for only empty
  if (elemType == validType.ANY) {
    if (elem.value.trim().length == 0) addErrMsg(elem, elemName);
    else removeErrMsg(elem);
  }
}

// adding the invalid text
function addErrMsg(formElem, formElemName) {
  formElem.nextElementSibling.innerHTML = `${formElemName} is invalid`;
}

// removing the invalid text
function removeErrMsg(formElem) {
  formElem.nextElementSibling.innerHTML = "";
}

// show the list data
const showListData = (listData, listContainer) => {
  listContainer.innerHTML = "";
  listData.forEach((listItem) => {
    let itemElem = document.createElement("div");
    itemElem.classList.add("preview-item");

    for (const key in listItem) {
      let subItemElem = document.createElement("span");
      subItemElem.classList.add("preview-item-val");
      subItemElem.innerHTML = `${listItem[key]}`;
      itemElem.appendChild(subItemElem);
    }
    listContainer.appendChild(itemElem);
  });
};

const displayCV = (userData) => {
  nameDsp.innerHTML =
    userData.firstname + " " + userData.middlename + " " + userData.lastname;
  phonenumberDsp.innerHTML = userData.phonenumber;
  emailDsp.innerHTML = userData.email;
  addressDsp.innerHTML = userData.address;
  designationDsp.innerHTML = userData.designation;
  summaryDsp.innerHTML = userData.summary;
  showListData(userData.projects, projectDsp);
  showListData(userData.achievements, achievementsDsp);
  showListData(userData.skills, skillsDsp);
  showListData(userData.educations, educationDsp);
  showListData(userData.experiences, experiencesDsp);
};

// pour generate cv
const generateCV = () => {
  let userData = getUserInputs();
  displayCV(userData);
  console.log(userData);
};

// pour afficher l'image -> to display a photo
function previewImage() {
  console.log("preview Image");
  let oFReader = new FileReader();
  console.log(imageElem);
  oFReader.readAsDataURL(imageElem.files[0]);
  oFReader.onload = function (ofEvent) {
    imageDsp.src = ofEvent.target.result;
  };
}

// PRINT CV
function printCV() {
  window.print();
}



// // JSON SCRIPT

// function getCVasJSON() {
//   const cvData = getUserInputs();
//   return JSON.stringify(cvData);
// }

// console.log(getCVasJSON());

// // function json
// function downloadJSON() {
//   const cvData = getUserInputs();
//   const json = JSON.stringify(cvData, null, 2);

//   const blob = new Blob([json], { type: "application/json" });
//   const url = URL.createObjectURL(blob);

//   const a = document.createElement("a");
//   a.href = url;
//   a.download = "cv-data.json";
//   a.click();

//   URL.revokeObjectURL(url);
// }
