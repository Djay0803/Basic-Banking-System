
# FRIV - Face Recognition In Video

In this project, our application employs advanced face detection algorithms to facilitate the identification of individuals in crowded places and recorded videos. Leveraging state-of-the-art computer vision techniques, the application analyzes the video feed or recorded footage to locate and recognize faces accurately.

The underlying face detection algorithm utilizes the Histogram of Oriented Gradients (HOG) method, a powerful image processing technique. This algorithm extracts facial features and distinguishes them from the background and other objects in the scene. The HOG models are trained using a single image of the suspect, allowing them to generalize well and detect faces under various conditions, including challenging scenarios like crowded environments.

Once a face is detected, the application applies face recognition techniques to match the detected face with a database of known individuals. The database can be populated by uploading a photo of the specific person of interest beforehand. Deep learning algorithms, such as deep neural networks (DNNs), are employed to learn discriminative features from faces and perform accurate matching.

To handle crowded places, the application incorporates advanced techniques such as multi-face tracking. This enables the system to track and maintain the identity of multiple individuals simultaneously, even as they move within the video frame or interact with each other.

In the case of recorded videos, the application can process the footage in real-time or perform batch processing, depending on the requirements. This allows users to search for a specific person within the recorded video and obtain corresponding timestamps or relevant information.

Overall, the combination of sophisticated face detection, recognition, and tracking algorithms empowers our application to locate and identify individuals in crowded places and recorded videos, thereby enhancing public safety and security.
## Features

- Compare Image
- Check Record
- Live Video
- Recorded Video
- Upload Suspect in database
## Step to run project

    1) Create Database with name "FRIV"
    2) Install all packages
    3) Follow deployment process
## Installation

Use the package manager [pip](https://pip.pypa.io/en/stable/) to install following packages.

```bash
pip install face-recognition
pip install pickle
pip install numpy
pip install opencv-python
```
## Deployment

To deploy this project run

```bash
python manage.py makemigrations
python manage.py migrate
python manage.py runserver
```


## Demo

- [FRIV Demo Video](https://drive.google.com/file/d/1N_hEFV8Xm8Z4xJL1Z4kBsUxEmwna4tCt/view?usp=sharing)
## Authors
- [Dhananjay Prajapati](https://www.linkedin.com/in/dhananjay-prajapati-35a1941b0)