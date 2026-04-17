pipeline {
    agent any

    stages {
        stage('Clone Code') {
            steps {
                git branch: 'main', url: 'https://github.com/priyankakapoor12/project3.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker build -t priyankakapoor12/project3 .'
            }
        }

        stage('Push to DockerHub') {
            steps {
                sh 'docker push priyankakapoor12/project3'
            }
        }

        stage('Deploy Container') {
            steps {
                sh '''
                docker stop myapp || true
                docker rm myapp || true
                docker run -d -p 80:80 --name myapp priyankakapoor12/project3
                '''
            }
        }
    }
}
