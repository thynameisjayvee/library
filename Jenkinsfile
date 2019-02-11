pipeline {
  agent {
    docker {
      image 'php'
    }

  }
  stages {
    stage('test') {
      steps {
        sh '''echo \'hello world\'
php -v'''
      }
    }
  }
}