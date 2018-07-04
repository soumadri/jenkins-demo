# jenkins-demo
A simple Hello World web application built with Symfony and Silex

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