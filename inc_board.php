<?

//-------------------------------------------------------------------------------------
// 게시판에서 사용할 기본 설정값들
//-------------------------------------------------------------------------------------

define("BBS_MAX_SEQ", 2000000000); // 고유번호의 최대값
define("BBS_MAX_PID", 2000000000); // 부모글(원글) 번호의 최대값
define("BBS_MAX_DIV", 1000000);    // DIV 분할코드의 최대값
define("BBS_CNT_DIV", 2000);       // DIV 분할코드당 게시물수
define("BBS_NEW_DAY", "+1 day");   // 게시판의 '새글' 표시 기간
define("BBS_HIT_LV1", 30);		   // 게시판의 '히트글' 표시 조회수 : 1레벨
define("BBS_HIT_LV2", 60);		   // 게시판의 '히트글' 표시 조회수 : 2레벨
define("BBS_HIT_LV3", 100);		   // 게시판의 '히트글' 표시 조회수 : 3레벨



// 설정 테이블의 앞 문자열
define("BBS_TBL_PREFIX", "jboard_"); // board_ + 'tbl01' = board_tbl01
// 게시판 테이블의 앞 문자열
define("BBS_BRD_PREFIX", BBS_TBL_PREFIX."bbs_"); // board_bbs_ + 'tbl01' = board_tbl01
// 코멘트 테이블의 앞 문자열
define("BBS_CMT_PREFIX", BBS_TBL_PREFIX."comment_"); // board_bbs_ + 'tbl01' = board_tbl01

// 게시판 테이블의 앞 문자열
define("BBS_BRD_DATA", BBS_TBL_PREFIX."data"); // 게시판데이터(통합테이블로 변경, 2016-07-08)
// 코멘트 테이블의 앞 문자열
define("BBS_CMT_DATA", BBS_TBL_PREFIX."comment"); // 꼬릿글데이터(통합테이블로 변경, 2016-07-08)


// SQL문 파일이 저장되는 디렉토리 설정
define( "DIR_SQL_WEB", "/bbs/sql/" );
define( "DIR_SQL_SYS", $_SERVER['DOCUMENT_ROOT'] . DIR_SQL_WEB );


//-------------------------------------------------------------------------------------
// thread 생성을 위한 ASCII 코드
//-------------------------------------------------------------------------------------
// 문자열로 사용이 가능한 33번 ~ 126번까지 사용한다.

$bbs_thread_array = array();
for($i=33; $i<127; $i++) {
	$bbs_thread_array[] = chr($i);
}


//-------------------------------------------------------------------------------------
// 게시판 전역 설정을 풀어놓자.
//-------------------------------------------------------------------------------------
$_html['title'] = $bbs_conf['bname'];


// 스킨이 저장되는 디렉토리 설정
$bbs_conf['skin_dir_web'] = "/re/bbslib/skin/" . $bbs_conf['skin'];
$bbs_conf['skin_dir_sys'] = $_SERVER['DOCUMENT_ROOT'] . $bbs_conf['skin_dir_web'];


// 파일 업로드용 디렉토리 설정
$bbs_conf['dir_web'] = "/files/board/";
$bbs_conf['dir_sys'] = $_SERVER['DOCUMENT_ROOT'] . $bbs_conf['dir_web'];


// 이미지형식을 의미하는 MIME TYPE
// 이 형식의 파일들은 웹브라우저에서 직접 보여줄 수 있다.
$mime['image'] = array( "image/jpg", "image/jpeg", "image/pjpg", "image/pjpeg", "image/gif", "image/png", );



// DB : 첨부파일 테이블명
$file_tbl = BBS_TBL_PREFIX. 'file'; // board_ + file = board_file

// DB : URL 링크 테이블명
$url_tbl = BBS_TBL_PREFIX. 'url'; // board_ + url = board_url




//-------------------------------------------------------------------------------------
// 관리자의 권한을 체크하자.
//-------------------------------------------------------------------------------------

/*
	회원의 레벨

	0 : 비회원, 비로그인
	1 : 가입 후 대기회원
	2 : 정식회원
	3 :
	4 :
	5 :
	6 :
	7 :
	8 :
	9 : 최고관리자

	게시판의 추가관리자

	- board_conf.admin : 관리자가 1명 지정할 수 있다.
*/


if( $_SESSION['mb_level']>1 && $_SESSION['mb_id']==$bbs_conf['admin'] ) {
	define("_BBS_ADMIN_", true);
}
if( $_SESSION['mb_level']>5 && $_SESSION['mb_id'] ) {
	define("_BBS_ADMIN_", true);
}


##--------------------------------------------------------------------------------------------------
## 스킨 리스트 가져오기
##--------------------------------------------------------------------------------------------------

$handle = opendir( $bbs_conf['skin_dir_sys'] );
while( $skin_info = readdir($handle) ) {
	// 특수문자, 상위디렉토리 걸러내기
	if(strpos($skin_info,".")===false) {
		$SKIN[ $skin_info ] = $skin_info;
	}
} // end while.
closedir($handle);














# end of script.