const courseLevelSelect = document.getElementById("course-level");
const courseInterestSelect = document.getElementById("course-interest");

const courses = {
  triennale: [
    "Architettura Moda e Design",
    "Beni Culturali",
    "Criminologia",
    "Digital Marketing",
    "Economia",
    "Filologia",
    "Filosofia",
    "Giurisprudenza",
    "Ingegneria Civile",
    "Ingegneria Gestionale",
    "Ingegneria Industriale",
    "Ingegneria Informatica",
    "Ingegneria elettronica",
    "Lettere",
    "Lingue",
    "Psicologia",
    "Scienze Biologiche",
    "Scienze del Turismo",
    "Scienze dell'Amministrazione",
    "Scienze della Comunicazione",
    "Scienze della Formazione",
    "Scienze della Nutrizione",
    "Scienze Motorie",
    "Scienze Politiche",
    "Sociologia",
    "Trasporti",
  ],
  magistrale: [
    "Architettura Moda e Design",
    "Beni Culturali",
    "Criminologia",
    "Digital Marketing",
    "Economia",
    "Filologia",
    "Filosofia",
    "Giurisprudenza",
    "Ingegneria Civile",
    "Ingegneria Gestionale",
    "Ingegneria Industriale",
    "Ingegneria Informatica",
    "Ingegneria elettronica",
    "Lettere",
    "Lingue",
    "Psicologia",
    "Scienze Biologiche",
    "Scienze del Turismo",
    "Scienze dell'Amministrazione",
    "Scienze della Comunicazione",
    "Scienze della Formazione",
    "Scienze della Nutrizione",
    "Scienze Motorie",
    "Scienze Politiche",
    "Sociologia",
    "Trasporti",
  ],
  "master-primo": [
    "Economia",
    "Beni Culturali",
    "Economia",
    "Ingegneria",
    "Psicologia",
    "Data Science",
    "Giurispurdenza",
    "Nutrizione",
    "Pubblica amministrazione",
    "Design",
    "Infermieristica",
    "Professioni sanitarie",
    "Scuola",
    "Sport",
    "Motoria",
    "Risorsa umane",
    "Digital marketing",
    "Informatica",
    "Project Management",
    "Scienze Politiche",
    "Non lo so",
  ],
  "master-secondo": [
    "Economia",
    "Beni Culturali",
    "Economia",
    "Ingegneria",
    "Psicologia",
    "Data Science",
    "Giurispurdenza",
    "Nutrizione",
    "Pubblica amministrazione",
    "Design",
    "Infermieristica",
    "Professioni sanitarie",
    "Scuola",
    "Sport",
    "Motoria",
    "Risorsa umane",
    "Digital marketing",
    "Informatica",
    "Project Management",
    "Scienze Politiche",
    "Non lo so",
  ],
  "recupero-scuola": null, // Disabilita la seconda select
};

// Funzione per aggiornare le opzioni
courseLevelSelect.addEventListener("change", () => {
  const selectedLevel = courseLevelSelect.value;

  // Resetta le opzioni della seconda select
  courseInterestSelect.innerHTML =
    '<option value="" disabled selected>Seleziona un corso</option>';

  if (courses[selectedLevel] === null) {
    courseInterestSelect.disabled = true; // Disabilita se è recupero scuola
  } else {
    courseInterestSelect.disabled = false;
    courses[selectedLevel].forEach((course) => {
      const option = document.createElement("option");
      option.value = course;
      option.textContent = course;
      courseInterestSelect.appendChild(option);
    });
  }
});
