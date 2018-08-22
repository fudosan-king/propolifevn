if [[ $1 == 'golive' ]] ; then
    echo '\n### ### [LYSBox - K Group] ### ###\n'
    if [ -f "wp-config.golive.php" ] ; then
        mv wp-config.php wp-config.dev.php
        mv wp-config.golive.php wp-config.php
        echo 'Config mode changed to GOLIVE MODE !!!\n'
    else
        echo 'Config GOLIVE MODE is running ...\n'
    fi
else
    if [[ $1 == 'dev' ]]; then
        echo '\n### ### [LYSBox - K Group] ### ###\n'
        if [ -f "wp-config.dev.php" ] ; then
            mv wp-config.php wp-config.golive.php
            mv wp-config.dev.php wp-config.php
            echo 'Config mode changed to DEV MODE !!!\n'
        else
            echo 'Config DEV MODE is running ...\n'
        fi
    else
        echo '\n### ### [LYSBox - K Group] ### ###\n'
        echo 'Parameters Description:  config-change [param]\n' ;
        echo '# golive: Change config file to life environment' ;
        echo '# dev: Change config file to dev environment\n' ;
    fi
fi
