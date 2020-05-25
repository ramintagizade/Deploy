# Deployment Tool 


## Start application 

<code> ./bin/deploy config.yml  </code>

## edit yaml file  
      
      repository: https://github.com/ramintagizade/Vagrantfile
      platform:
          development:
              branch: dev
              servers:
                  dev-server-1:
                      host: localhost
                      user: vagrant
                      password: vagrant
                      path: /home/vagrant/dev
                      port: 2222
          production:
              branch: master
              servers:
                  prod-demo-1:
                      host: localhost
                      user: vagrant
                      password: vagrant
                      path: /home/vagrant/prod
                      port : 2222
