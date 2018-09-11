#!/bin/sh

# GOLIVE PROCESS
if [[ $1 == '-golive' ]] ; then
    echo '\n### ### [FGM Group - KN] ### ###\n'
    if [ -f "wp-config.golive.php" ] ; then

        if [ ! -f "wp-config.dev.php" ] ; then
            mv wp-config.php wp-config.dev.php
        fi

        mv wp-config.golive.php wp-config.php
        echo 'Config mode changed to GOLIVE MODE !!!\n'
    else
        echo 'Config GOLIVE MODE is running ...\n'
    fi
else
    # DEV PROCESS
    if [[ $1 == '-dev' ]]; then
        echo '\n### ### [FGM Group - KN] ### ###\n'
        if [ -f "wp-config.dev.php" ] ; then

            if [ ! -f "wp-config.golive.php" ] ; then
                mv wp-config.php wp-config.golive.php
            fi

            mv wp-config.dev.php wp-config.php
            echo 'Config mode changed to DEV MODE !!!\n'
        else
            echo 'Config DEV MODE is running ...\n'
        fi
    else
        # STATUS PROCESS
        if [[ $1 == '-status' ]]; then
            echo '\n### ### [FGM Group - KN] ### ###\n'

            if [ ! -f "wp-config.golive.php" ] ; then
                echo 'Config GOLIVE MODE is running ...\n'
            fi

            if [ ! -f "wp-config.dev.php" ] ; then
                echo 'Config DEV MODE is running ...\n'
            fi

        else
            echo '\n### ### [FGM Group - KN] ### ###\n'
            echo 'Parameters Description:  config-change [param]\n' ;
            echo '# -status: Show status of current environment' ;
            echo '# -golive: Change config file to life environment' ;
            echo '# -dev: Change config file to dev environment\n' ;
        fi
    fi
fi
