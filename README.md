## Up all containers  
docker-compose -f .\setup\docker-compose.yml build  
docker-compose -f .\setup\docker-compose.yml up -d  

## Install Aplication  
docker-compose -f .\setup\docker-compose.yml exec api composer install  
docker-compose -f .\setup\docker-compose.yml exec api cp .env.example .env  
docker-compose -f .\setup\docker-compose.yml exec api php artisan migrate  
docker-compose -f .\setup\docker-compose.yml exec api php artisan db:seed  
