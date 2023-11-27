const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress-wrap");
const formSteps = document.querySelectorAll(".tabpanel");
const progressSteps = document.querySelectorAll(".progress-bar");

let formStepsNum = 0;

nextBtns.forEach((btn) => {

  btn.addEventListener("click", () => {
    if (validateCurrentStep()) {
      formStepsNum++;
      updateFormSteps();
      updateProgressbar();

    } else {
        // console.log("error next button");
    }
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
      formStepsNum--;
      updateFormSteps();
      updateProgressbar();
  });
});


function validateCurrentStep() {
  
  const currentFormStep = document.querySelector(".show");
  const requiredFields = currentFormStep.querySelectorAll("input[required], select[required], [type='checkbox'][required]");
  let isValid = true;

  requiredFields.forEach((field) => {
    const fieldMessage = field.nextElementSibling; // Assuming fieldMessage is a sibling of the input field

    if (field.type === "checkbox") {
      if (!field.checked) {
        isValid = false;
        fieldMessage.style.display = "block";
      } else {
        fieldMessage.style.display = "none";
      }
    } else if (field.tagName === "SELECT" ) {
      if (field.value === "") {
        isValid = false;
        field.classList.add("error");
        fieldMessage.style.display = "block";
      } else {
        field.classList.remove("error");
        fieldMessage.style.display = "none";
      }
    } 
    else if (!field.value) {
      isValid = false;
      field.classList.add("error");
      fieldMessage.style.display = "block";
    } else {
      field.classList.remove("error");
      fieldMessage.style.display = "none";
    }
  });

  return isValid;
}



function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("show") &&
      formStep.classList.remove("show");
  });

  formSteps[formStepsNum].classList.add("show");
}



function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
  
    if (idx != formStepsNum) {
      progressStep.classList.remove("active-prog");
      progressStep.classList.remove("active-prog-first");
      progressStep.classList.remove("active-prog-last");

    } else if (formStepsNum === 0) {
      if (formStepsNum === 0) {
        progressStep.classList.add("active-prog-first") 

      } else {
        progressStep.classList.remove("active-prog");
      }

    } else if (formStepsNum === 4) {
      if (formStepsNum === 4) {
        progressStep.classList.add("active-prog-last") 

      } else {
        progressStep.classList.remove("active-prog");
      }
    } else {
        progressStep.classList.add("active-prog") 
    }


  });

}