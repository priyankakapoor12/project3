pipeline {
    agent any

    stages {
        stage('Clone Code') {
            steps {
                git branch: 'main', url: 'https://github.com/priyankakapoor12/project3.git'
            }
        }

        stage('Deploy') {
            steps {
                sh '''
                sudo rm -rf /var/www/html/*
                sudo cp -r * /var/www/html/
                sudo systemctl restart apache2
                '''
            }
        }
    }
}
