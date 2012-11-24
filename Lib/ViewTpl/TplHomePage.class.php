<?php
/**
 * User: nekosama
 * Date: 12-11-24
 * Time: 下午4:26
 */

/**
 *  博客浏览主页的模板
 */
class TplHomePage
{
    /**
     * @param $para 所需key分别为：text_blog_id; user_id;  user_head_pic; user_head_name; user_homepage; text_title; reposet_path;
     * @param $content 文字的内容数组，一段为一个元素
     * @param $tag tag的内容数组
     * @return string 返回渲染好的html
     */
    public function getTextTpl($para, $content, $tag)
    {
        $result = "
        <div class='feed  feed-text' data-id='" . $para['text_blog_id'] . "'>
                        <div class='feed-avatar'>
                            <div class='blog-info blog-menu-info enable' data-user-id='" . $para['user_id'] . "'><a target='_blank'
                                                                                                         avatar='" . $para['user_head_pic'] . "'
                                                                                                         title='" . $para['user_head_name'] . "'
                                                                                                         href='" . $para['user_homepage'] . "'
                                                                                                         class='blog-avatar'
                                                                                                         style='background-image: url(" . $para['user_head_pic'] . ");'>" . $para['user_head_name'] . "</a>

                            </div>
                        </div>
                        <div class='feed-content-holder pop'>
                            <div class='pop-triangle'></div>
                            <div class='feed-container-top'></div>
                            <div class='pop-content clearfix'>
                                <div class='feed-hd'>
                                    <div class='feed-basic'><a target='_blank' href=" . $para['user_homepage'] . "
                                                               class='feed-user'>" . $para['user_head_name'] . "</a></div>
                                </div>
                                <div class='feed-bd'>
                                    <h4 class='feed-title'>" . $para['text_title'] . "</h4>

                                    <div class='feed-ct'>
                                        <div class='feed-txt-full rich-content'>
                                            <div class='feed-txt-summary'>
        ";
        for ($i = 0; $i < count($content); $i++) {
            $result .= "<p>" . $content[$i] . "</p>";
        }

        $result .= "
        </div>
        </div>
        </div>
        <div class='feed-tag clearfix'>
        ";

        for ($i = 0; $i < count($tag); $i++) {
            //注意定义的tag的keyName
            $result .= "<a href='" . $tag[$i]['href'] . "'>#" . $tag[$i]['tag_name'] . "</a>";
        }

        $result .= "
        </div>
                                    <div class='feed-act'><a title='喜欢' class='feed-fav '>喜欢</a>
									<a class='feed-rt'
                                                                                                    target='_blank'
                                                                                                    href=" . $para['reposet_path'] . ">转载</a>
                                        <a class='feed-cmt' data-nid=" . $para['text_blog_id'] . ">回应</a>

										</div>
                                </div>
                            </div>


        ";
        return $result;
    }

    /**
     * @param $para 所需key为: comment_blog_id;
     * @param $comment 评论用户的信息二维数组，一维格式为: user_name; user_id; user_homepage; user_head_picpath; user_comment
     * @return string
     */
    public function getCommonFooter($para, $comment)
    {
        $result = "
        <div class='feed-ft J_FeedFooter' style='display:none'>
            <div class='feed-ft-bottom'></div>
            <div class='feed-ft-triangle J_FeedFooterTriangle'></div>
            <div class='feed-fold-container comment' style='display:none' data-comment-id=" . $para['comment_blog_id'] . ">
                <div class='feed-comment'>
                    <div class='add-comment clearfix'>
					<textarea autocomplete='off' cloud='' placeholder=''
                                                                class='ui-textarea skin-textarea-willwhite'
                                                                style='width: 408px; height: 18px;'></textarea>


                        <div class='ui-button skin-button-willsilver' cloud='' style='width: 60px;'><span
                                class='ui-button-bg-left skin-button-willsilver-bg-left'></span>

                            <div class='ui-button-label skin-button-willsilver-label'><span
							class='ui-button-text skin-button-willsilver-text'>发布</span></div>
                        </div>
                    </div>
                    <ul class='cmt-list'>
        ";

        for ($i = 0; $i < count($comment); $i++) {
            $result .= "
            <li class='cmt-list-item clearfix first-cmt' data-user-name=" . $comment[$i]['user_name'] . " data-user-id=" . $comment[$i]['user_id'] . ">
                            <div class='clearfix'><a href=" . $comment[$i]['user_homepage'] . " target='_blank'>
							<img    class='cmt-avatar'
                                    src=" . $comment[$i]['user_head_picpath'] . "
                                    width='20' height='20'></a>

									<span class='cmt-main'><a
                                    href=" . $comment[$i]['user_homepage'] . " target='_blank'
                                    class='cmt-user'>" . $comment[$i]['user_name'] . "</a><span class='cmt-content'>" . $comment[$i]['user_comment'] . "</span></span>
                        </li>
            ";
        }

        $result .= "
            </ul>
                </div>
                <div class='feed-fold-footer'>
				<a class='J_CommentsLoading fold-btn-loading' style='display: none;'>正在加载...</a>
				<a class='J_CommentsFolder fold-btn-close' href='#' onclick='return false;'><span
                        class='J_CommentsFolder btn-icon'></span>收起</a>
						<a class='J_GetMoreComments fold-btn-more'
                                                                          href='#' onclick='return false;'
                                                                          style='display:none;'><span
                        class='J_GetMoreComments btn-icon'></span>更多回应</a></div>
            </div>
        </div>
                            <div class='feed-container-bottom'></div>
                            <div class='post-flag-panel'></div>
                        </div>
                        </div>
        ";
        return $result;
    }

    public function getMusicTpl()
    {
        $content = "

        ";
        return $content;
    }

    public function getVideoTpl()
    {
        $content = "

        ";
        return $content;
    }

    public function getPictureTpl()
    {
        $content = "

        ";
        return $content;
    }

    public function getLinkTpl()
    {
        $content = "

        ";
        return $content;
    }
}