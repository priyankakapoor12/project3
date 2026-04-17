pipeline {
    agent any

    stages {
        stage('Clone Code') {
            steps {
                git branch: 'main', url: 'https://github.com/priyankakapoor12/project3.git'
            }
        }

        stage('Docker Login') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'dockerhub-creds', usernameVariable: 'USER', passwordVariable: 'PASS')]) {
                    sh 'echo $PASS | docker login -u $USER --password-stdin'
                }
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
                docker run -d -p 8080:80 --name myapp priyankakapoor12/project3
                '''
            }
        }
    }
}
