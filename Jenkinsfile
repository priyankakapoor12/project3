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
                sh 'docker build -t priyankakapoor/php-app .'
            }
        }

        stage('Push to DockerHub') {
            steps {
                sh 'docker push priyankakapoor/php-app'
            }
        }

        stage('Deploy Container') {
            steps {
                sh '''
                docker stop myapp || true
                docker rm myapp || true
                docker run -d -p 80:80 --name myapp priyankakapoor/php-app
                '''
            }
        }
    }
}
