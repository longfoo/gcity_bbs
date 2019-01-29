<?
#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
# 이 페이지의 접근 권한 설정
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//define("_AUTH_", "ADMIN");
#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
# 이 페이지의 페이지 코드 설정
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
define("_INDEX_", true);
#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
# 페이지 공통 라이브러리 호출
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
include_once $_SERVER['DOCUMENT_ROOT'] . "/re/lib/database.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/re/lib/library.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/re/lib/session.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/re/lib/config.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/re/lib/escape_get_post.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/re/lib/mobile.php"; # 모바일로 자동전환
#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
#     접근 권한 체크
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
include_once $_SERVER['DOCUMENT_ROOT'] . "/re/lib/access.php";
#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
# 관리자설정값을 가져온다. (DB conf_table)
$ar_config = get_config();
if($ar_config['ssl_refresh']=="y") {
	if($_SERVER['SERVER_PORT']=='80') {
		header("Location: https://". $_SERVER['HTTP_HOST'] );
	}
}
#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
# <HTML> <HEAD> <BODY> 호출
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
include_once $_SERVER['DOCUMENT_ROOT'] . "/re/include/html_header.php";
#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
?>




<style type="text/css">
.index-wrap { margin:50px 0 70px; min-height:400px; }
.index-wrap * { box-sizing:border-box; }
.index-wrap::after { display:block; clear:both; content:''; }
/* info */
.info-wrap { margin:0 0 1rem 0; }
.info-wrap ol { list-style-type:decimal; padding-left:10px; list-style-position:inside; }
.info-wrap ol li { list-style-type:decimal; }
.info-wrap img { white-space:pre; }
/* login */
div.login-wrap { padding:0 0 3rem 0; }
div.login-wrap .welcome { display:inline-block; font-size:.8125rem; width:400px; }
div.login-wrap input { display:inline-block; max-width:140px; margin:0 4px 0 0; height:1.5rem; }
div.login-wrap a { display:inline-block; max-width:140px; margin:0 4px 0 0; height:1.5rem; }
div.login-wrap .button { height:1.5rem; padding:.25rem .5rem; }
div.login-wrap input[type=text] { font-size:.8125rem; }
div.login-wrap input[type=password] { font-size:.8125rem; }
/* board */
div.board-wrap { padding:0 0 2rem 0; }
h4.cell-title { width:calc(100% - 20px); margin:0 0 1rem 0; }
h4.cell-title span.more { float:right; }
h4.cell-title span.more a { color:#bbbbbb; }
h4.cell-title:hover span.more a { color:#444444; }
ul.board { width:calc(100% - 20px); font-size:.8125rem; }
ul.board li { padding-left:10px; height:24px; background:url(/images/global/dot_01.gif) no-repeat left center; }
ul.board li .item-text { display:inline-block; width:290px; line-height:24px; }
ul.board li .item-date { display:inline-block; width:70px; line-height:24px; text-align:right; }
/* bottom */
.bottom-wrap { margin:0 0 1rem 0; }
.bottom-wrap .cell span { display:block; width:100%; height:140px; border-top:1px solid #cccccc; border-left:1px solid #cccccc; border-bottom:1px solid #cccccc; text-indent:-9999rem; }
.bottom-wrap .cell #go1 { background:url(/re/images/main/go01.jpg) left center no-repeat; }
.bottom-wrap .cell #go2 { background:url(/re/images/main/go02.jpg) left center no-repeat; }
.bottom-wrap .cell #go3 { background:url(/re/images/main/go03.jpg) left center no-repeat;  border-right:1px solid #cccccc;}
</style>







<div class="index-wrap">


    <div class="grid-x">
        <div class="large-4 cell">
            <div class="info-wrap">
                <img src="/re/images/main/guide.jpg" alt="이용절차 안내
1.회원가입 신청
2.사업자등록증 제출(팩스)
3.회원가입 승인 확인
4.인터넷 예약신청
5.추첨결과 확인
6.수수료 입금(인터넷뱅킹, 무통장입금)
7.인터넷 승인 확인
8.해당일에 지정게시대 게시

수수료 납부계좌
농협 1177-01-002025 (계룡시장)">
            </div>

            <div class="info-wrap">
                <a href="/re/member/agreement.php" title="이용자 준수사항 바로가기"><img src="/re/images/main/user.jpg" alt="이용자 준수사항 바로가기"></a>

            </div>
        </div>
        <div class="large-8 cell">

            <!-- begin : login box -->

            <? if($_SESSION['uid']) { ?>
            <div class="grid-x login-wrap">
                <span class="welcome"><strong><?=$_SESSION['uname']?></strong> (<strong><?=$_SESSION['uid']?></strong>)님께서 로그인하였습니다.</span>
                <a href="/re/mypage/modify.php" class="button small secondary">회원정보수정</a>
                <a href="/re/member/logout.php" class="button small secondary">로그아웃</a>
            </div>
            <? } else { ?>
            <form action="/re/member/user_Authenticate.php" id="index-form" method="post">
            <div class="grid-x login-wrap">
                <input type="text" name="id" id="login-id" placeholder="아이디">
                <input type="password" name="passwd" id="login-pw" placeholder="비밀번호">
                <input type="submit" class="button small" value="로그인">
                <a href="/re/member/member_reg_step1.php" class="button small secondary">회원가입</a>
                <a href="/re/member/find_idpw.php" class="button small secondary">아이디/비밀번호 찾기</a>
            </div>
            </form>
            <? } ?>

            <!-- end : login box -->

            <!-- begin : board box -->

            <div class="grid-x board-wrap">
                <div class="large-6 cell">
                    <h4 class="cell-title">
                        <i class="fi-list"></i> 공지사항
                        <span class="more"><a href="/re/notice/notice.php" title="더보기"><i class="fi-plus"></i></a></span>
                    </h4>
                    <ul class="board">
                        <?
                        $qry_bbs = "SELECT * FROM jboard_data WHERE bid='notice' ORDER BY seq LIMIT 5";
                        $res_bbs = mysql_query($qry_bbs);
                        if (!$res_bbs) {
                            //alert("QUERY_ERROR");
                            //exit;
                        }

                        while($row = mysql_fetch_array($res_bbs)) {
                        ?>
                        <li class="item">
                            <span class="item-text"><a href="/re/notice/notice.php?d=v&seq=<?=(2000000001-$row['seq'])?>"><?=$row['txt_subject']?></a></span>
                            <span class="item-date"><?=date("Y.m.d",strtotime($row['log_ctime']))?></span>
                        </li>

                        <?
                        }
                        ?>
                    </ul>
                </div>

                <div class="large-6 cell">
                    <h4 class="cell-title">
                        <i class="fi-list"></i> 행정자료실
                        <span class="more"><a href="/re/notice/pds.php" title="더보기"><i class="fi-plus"></i></a></span>
                    </h4>
                    <ul class="board">
                        <?
                        $qry_bbs = "SELECT * FROM jboard_data WHERE bid='download' ORDER BY seq LIMIT 5";
                        $res_bbs = mysql_query($qry_bbs);
                        if (!$res_bbs) {
                            //alert("QUERY_ERROR");
                            //exit;
                        }

                        while($row = mysql_fetch_array($res_bbs)) {
                        ?>
                        <li class="item">
                            <span class="item-text"><a href="/re/notice/pds.php?d=v&seq=<?=(2000000001-$row['seq'])?>"><?=$row['txt_subject']?></a></span>
                            <span class="item-date"><?=date("Y.m.d",strtotime($row['log_ctime']))?></span>
                        </li>

                        <?
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <!-- end : board box -->


            <!-- begin : bottom1 box -->
            <div class="grid-x bottom-wrap">
                <div class="large-4 cell">
                    <a href="/re/standard/standard.php" title="표준규격 바로가기"><span id="go1">표준규격 바로가기</span></a>
                </div>
                <div class="large-4 cell">
                    <a href="/re/regist/reg_placard.php" title="현수막 게시신청 바로가기"><span id="go2">현수막 게시신청 바로가기</span></a>
                </div>
                <div class="large-4 cell">
                    <a href="/re/relation/relation_regist.php" title="인터넷 홍보신청"><span id="go3">인터넷 홍보신청</span></a>
                </div>
            </div>
            <!-- end : bottom1 box -->

        </div>

    </div>





</div>




<script>
$(document).ready(function(){
    $("#index-form").bind("submit",function(){
        if($("#login-id").val()=="") { alert("아이디를 입력하세요. "); $("#login-id").focus(); return false; }
        if($("#login-pw").val()=="") { alert("비밀번호를 입력하세요. "); $("#login-pw").focus(); return false; }
    });
});
</script>


<?
#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
# 팝업 띄우기 {	사용함 = true, 사용안함 = false }
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//define("POPUP_CHECK", true);
#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
# HTML footer 호출
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
include_once $_SERVER['DOCUMENT_ROOT'] . "/re/include/html_footer.php";
#++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
?>
