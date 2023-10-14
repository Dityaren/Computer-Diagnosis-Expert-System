# Computer Diagnosis Expert System

This is a computer diagnosis expert system website written in CodeIgniter 3. The system allows users to enter their name and then proceed to the diagnosis page. The diagnosis page contains a JavaScript script that performs the diagnosis based on selected symptoms.

## Installation

To run the website, make sure you have PHP and CodeIgniter 3 installed. Then, follow these steps:

1. Clone the repository:

```bash
git clone https://github.com/Dityaren/Computer-Diagnosis-Expert-System
```

2. Change into the project directory:

```bash
cd Computer-Diagnosis-Expert-System
```

3. Start a local development server:

```bash
php -S localhost:8000
```

4. Open your web browser and visit `http://localhost:8000` to access the website.

## Usage

1. On the homepage, enter your name and click "Start" to proceed to the diagnosis page.

2. On the diagnosis page, a set of checkboxes representing different symptoms will be displayed.

3. Select the symptoms that apply to your computer issue.

4. Click the "Diagnose" button to initiate the diagnosis process.

5. The system will analyze the selected symptoms and display a list of possible computer issues.

6. Each issue will be accompanied by a brief description.

7. If no matching diagnosis is found, a message indicating no suitable diagnosis will be displayed.

8. You can repeat the process by clicking the "Restart Diagnosis" button.

## JavaScript Script

The diagnosis page contains a JavaScript script that handles the symptom selection and diagnosis process. Here is a brief explanation of the script:

- The script uses jQuery and executes when the document is ready.

- It fades in the bot container and symptom form container after a certain delay.

- The `diagnosisTable` variable stores a mapping between symptom groups and corresponding diagnoses.

- The `getSymptomDescription` function returns a description for a given symptom code.

- The script attaches a submit event handler to the symptoms form.

- When the form is submitted, it disables the submit button, retrieves the selected symptoms, and performs the diagnosis.

- The diagnosis results are dynamically generated based on the selected symptoms and displayed on the page.

- The `getDiagnosisDetails` function returns details for a given diagnosis code.

## Contributing

If you encounter any issues or have suggestions for improvement, feel free to open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).
