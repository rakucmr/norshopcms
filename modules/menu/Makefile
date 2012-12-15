DIST_FILE = kohana-menu_0.1.tar.gz

all:


dist:

	tar czvf ../${DIST_FILE} --numeric-owner --exclude ".git*" --exclude Makefile --exclude "*.tar.gz" -C .. menu
	mv ../${DIST_FILE} .

clean:
	rm -f ${DIST_FILE}