#!/bin/bash

currentDir=`pwd`

echo "Enter the tag name:"
read tagName

echo "Temporary directory:"
read tempDir

# Verify the temporary directory exists
if [ ! -d $tempDir ]; then
  echo "Directory $tempDir does not exist."
  exit
fi

# Set tempDir to the absolute path for ease of use
cd $tempDir
tempDir=`pwd`

# Create a "tmp" folder and do all the work there
mkdir tmp
cd tmp

# Clone the neatline-omeka-s directory and install dependencies
git clone -b $tagName https://github.com/performant-software/neatline-omeka-s.git neatline-omeka-s

cd neatline-omeka-s
composer install

cd ..

# Clone the neatline-spa directory, install dependencies, and create production build
git clone -b $tagName https://github.com/performant-software/neatline-omeka-s.git neatline-spa

cd neatline-spa

touch .env

echo "NODE_BUILD_DIR=build" >> .env
echo "NODE_BUILD_DESTINATION=$tempDir/tmp/neatline-omeka-s/asset/neatline/build" >> .env

yarn install
yarn run build
yarn run deploy

cd ..
cd neatline-omeka-s

# Create the zip file and move it to the current directory
zip -r Neatline.zip .
mv Neatline.zip $currentDir

# Cleanup temporary directory
cd $tempDir
rm -rf tmp
cd $currentDir