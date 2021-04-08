#!/bin/bash -xe
exec > >(tee /var/log/user-data.log|logger -t user-data -s 2>/dev/console) 2>&1
export AWS_SECRET_ACCESS_ID=TOCHANGE
export AWS_SECRET_ACCESS_KEY=TOCHANGE
export AWS_DEFAULT_REGION=TOCHANGE
sudo yum update -y
sudo amazon-linux-extras install -y php7.2
sudo yum install -y httpd php-mbstring
sudo systemctl start httpd
sudo systemctl enable httpd
cd /tmp
sudo curl "https://awscli.amazonaws.com/awscli-exe-linux-x86_64.zip" -o "awscliv2.zip"
sudo unzip awscliv2.zip
sudo ./aws/install
cd /var/www/html
sudo wget https://docs.aws.amazon.com/aws-sdk-php/v3/download/aws.zip
sudo unzip aws.zip 
sudo -E aws s3 cp s3://cpe-bucket-test/common.php common.php
sudo -E aws s3 cp s3://cpe-bucket-test/creationtable.php creationtable.php
sudo -E aws s3 cp s3://cpe-bucket-test/function.php function.php
sudo -E aws s3 cp s3://cpe-bucket-test/index.php index.php
sudo -E aws s3 cp s3://cpe-bucket-test/validation.php validation.php
sudo mkdir .aws
cd .aws
sudo -E aws s3 cp s3://cpe-bucket-test/credentials credentials
sudo sed -i 's/##AWS_ACCESS_KEY_ID##/'$AWS_SECRET_ACCESS_ID'/' /var/www/html/.aws/credentials
sudo sed -i 's/##AWS_SECRET_ACCESS_KEY_ID##/'$AWS_SECRET_ACCESS_KEY'/' /var/www/html/.aws/credentials
cd ..
sudo chmod 777 .aws/*
php creationtable.php
