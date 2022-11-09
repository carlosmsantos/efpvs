FROM wordpress:latest

RUN DEBIAN_FRONTEND=noninteractive apt-get update && \
    apt-get install -y -q \
     libc-client-dev \
     libkrb5-dev \
     sendmail \
    && rm -rf /var/lib/apt/lists/*
RUN a2enmod setenvif
#RUN sendmailconfig

RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install imap

#CMD service sendmail restart

