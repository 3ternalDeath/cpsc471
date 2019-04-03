#!/bin/bash

LOCALDIR=/Applications/XAMPP/xamppfiles/var/mysql/cinemaDB

echo "This will overwrite the current LOCAL database"
printf "Continue(y/n)?"
read confirm
if [ "$confirm" != "${confirm#[Yy]}" ] ;then
    rm -r $LOCALDIR
    cp -r cinemaDB $LOCALDIR
    chown _mysql $LOCALDIR
    chown _mysql $LOCALDIR/*
    chgrp _mysql $LOCALDIR
    chgrp _mysql $LOCALDIR/*
    chmod 700 $LOCALDIR
    chmod 660 $LOCALDIR/*
    echo "Completed"
else
    echo "Aborted"
fi
