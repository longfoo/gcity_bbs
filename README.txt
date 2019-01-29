계룡시 현수막시스템 게시판 교체 작업


구 프로그램 제거

	/re/notice => 삭제 또는 이동
	
원본 설치

	/re/include/inc_board.php 게시판 공용호출파일 (관리자에서 사용함)
	/re/bbslib/ 게시판 프로그램 및 스킨파일
	/re/notusr_hbms/board* 관리자용 설정파일
	/re/notice/notice.php 개별 게시판 : 공지사항
	/re/notice/pds.php 개별 게시판 : 자료실

	DB 스키마 파일 : jboard_*.sql


링크 URL 변경

	상단메뉴 : /re/include/html_header.php
	좌측메뉴 : /re/include/left_menu.php
	메인페이지 : /re/index.php
	
첨부파일 디렉토리 생성

	/re/files 777
	/re/files/board 777



