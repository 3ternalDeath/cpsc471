#!/bin/bash

LOCALDIR=/opt/lampp/var/mysql/cinemaDB
USERNAME=parva
GRPNAME=users

echo "This will overwrite the current GIT database"
printf "Continue(y/n)?"
read confirm
if [ "$confirm" != "${confirm#[Yy]}" ] ;then
    rm -r cinemaDB
    cp -r $LOCALDIR cinemaDB
    chown $USERNAME cinemaDB
    chown $USERNAME cinemaDB/*
    chgrp $GRPNAME cinemaDB
    chgrp $GRPNAME cinemaDB/*
    echo "Completed"
else
    echo "Aborted"
fi
