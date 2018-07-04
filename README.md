# jenkins-demo
A simple Hello World web application built with Symfony and Silex

# Jenkins docker command
    #Change {YOUR_JENKINS_HOME}, {HOME_DIR} and {YOUR_WEB_DEPLOY_ROOT} appropriately before using
    docker run -p 8082:8080 -p 50000:50000 --add-host git.tnq.co.in:10.0.0.160 --add-host smtp.gmail.com:74.125.24.108 -v {YOUR_JENKINS_HOME}:/var/jenkins_home -v {HOME_DIR}:/home -v {YOUR_WEB_DEPLOY_ROOT}:/home/deployroot -d jenkins-php-ci

# Jenkins project configurations
### SCM 
https://github.com/soumadri/jenkins-demo.git
### Shell scripts

**__NOTE: Change {YOUR_SERVER_IP}, {YOUR_SERVER_PORT} and {YOUR_WEB_ROOT_FOLDER} appropriately before using__**

#### PHP composer update
	cd ${WORKSPACE}
	composer update

#### Run unit tests
	php ${WORKSPACE}/vendor/bin/codecept run unit SimpleUnitTest

#### Change API configuration
	sed -i -e "s#localhost:9090#{YOUR_SERVER_IP}:{YOUR_SERVER_PORT}/${BUILD_NUMBER}#g" ${WORKSPACE}/tests/api.suite.yml
    
#### Deploy
	#Package the artifacts and deploy
	cd ${WORKSPACE}
	tar --exclude=".git" --exclude="*.md" --exclude="composer.*" -zvcf /tmp/${JOB_NAME}_${BUILD_NUMBER}.tgz *
    
    #Move to deploy folder with the new build number
	mkdir /home/deployroot/${BUILD_NUMBER}
	cd /home/deployroot/${BUILD_NUMBER}
	mv /tmp/${JOB_NAME}_${BUILD_NUMBER}.tgz .
    
    #Untar
	tar -xf ${JOB_NAME}_${BUILD_NUMBER}.tgz

	#Remove the deploy package
	rm ${JOB_NAME}_${BUILD_NUMBER}.tgz

#### Run API tests
	php ${WORKSPACE}/vendor/bin/codecept run api
    
#### Finally symlink to new build
	cd {YOUR_WEB_ROOT_FOLDER}
	ln -sfn ./${BUILD_NUMBER} ./api