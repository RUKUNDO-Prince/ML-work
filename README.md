# ML-work

This repository contains an ML project called SARURA, it is a model that detects and predicts a disease taht a plant is diagnosed with just from its leaves. The work showcases different machine learning techniques, algorithms, and data processing tasks, implemented in Python using popular ML libraries like scikit-learn, TensorFlow, or similar. The model is tested in a streamlit app that hosts the model and showcases its functionalities. To develop the model, I used the dataset plantvillage from kaggle
1. **Clone the repository**:
   ```bash
   git clone https://github.com/RUKUNDO-Prince/ML-work.git
   cd ML-work/streamlit-app/app
   ```

2. **Create a virtual environment (optional but recommended)**:
   ```bash
   python -m venv venv
   source venv/bin/activate   # On Windows use `venv\Scripts\activate`
   ```

3. **Install the required dependencies**:
   It is recommended to use `requirements.txt`, in case it's missing, install the dependencies manually.
   ```bash
   pip install -r requirements.txt
   ```
4. **Download the saved model from the link provided in the txt file which is in app/trained_model, the model should be saved in the same directory**

1. **Run the project to see all the functionalities of the model**:
   ```bash
   git clone https://github.com/RUKUNDO-Prince/ML-work.git
   cd ML-work/streamlit-app/app
   ```

Here’s an example of how a typical machine learning notebook might be structured:

1. **Loading Data**:
   ```python
   import pandas as pd
   data = pd.read_csv('data.csv')
   ```

2. **Preprocessing Data**:
   ```python
   from sklearn.preprocessing import StandardScaler
   scaler = StandardScaler()
   scaled_data = scaler.fit_transform(data)
   ```

3. **Building a Model**:
   ```python
   from sklearn.model_selection import train_test_split
   X = scaled_data
   y = data['target']
   X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2)
   
   from sklearn.ensemble import RandomForestClassifier
   model = RandomForestClassifier()
   model.fit(X_train, y_train)
   ```

4. **Evaluating the Model**:
   ```python
   from sklearn.metrics import accuracy_score
   y_pred = model.predict(X_test)
   print(f'Accuracy: {accuracy_score(y_test, y_pred)}')
   ```
