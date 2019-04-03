#!/bin/bash

LOCALDIR=/opt/lampp/var/mysql/cinemaDB

echo "This will overwrite the current LOCAL database"
printf "Continue(y/n)?"
read confirm
if [ "$confirm" != "${confirm#[Yy]}" ] ;then
    rm -r $LOCALDIR
    cp -r cinemaDB $LOCALDIR
    chown mysql $LOCALDIR
    chown mysql $LOCALDIR/*
    chgrp mysql $LOCALDIR
    chgrp mysql $LOCALDIR/*
    echo "Completed"
else
    echo "Aborted"
fi
