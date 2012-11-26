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
     * @param $para 所需key分别为：blog_id; user_id;  user_head_pic; user_head_name; user_homepage; text_title; reposet_path; hot_point
     * @param $content 富文本编辑器直接得到的内容，包含html标签
     * @param $tag tag的内容数组
     * @return string 返回渲染好的html
     */
    public function getTextTpl($para, $content, $tag)
    {
        $result = "
        <div class='feed  feed-text' id='".$para['blog_id']."'>
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
        $result.=$content;
//        for ($i = 0; $i < count($content); $i++) {
//            $result .= "<p>" . $content[$i] . "</p>";
//        }

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
                                        <a class='feed-cmt' data-nid=" . $para['blog_id'] . ">回应</a>

                                        <a
                            data-type='photo' id='hot_point".$para['hot_point']."'
                            class='feed-nt'>热度(".$para['hot_point'].")</a>

										</div>
                                </div>
                            </div>


        ";
        return $result;
    }

    /**
     * @param $para 键值为blog_id; user_id;  user_head_pic; user_head_name; user_homepage; pic_path; reposet_path; hot_point
     * @param $content 富文本编辑器直接得到的内容，包含html标签
     * @param $tag tag的内容数组
     * @return string 返回渲染好的html
     */
    public function getPictureTpl($para,$content,$tag)
    {
        $result = "
        <div class='feed  feed-photo' id='".$para['blog_id']."'>
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

                                <div class='feed-ct' largeimg='true'>
                    <div class='feed-img-all post-one-img no-title '>
                        <div class='feed-big-img'><img class='feed-img J_BigImage'
                                                       imgsrc=".$para['pic_path']."
                                                       data-lazyload='true'
                                                       width=100% height=100% alt=''
                                                       src=".$para['pic_path'].">

                            <div class='img-exif-holder enable'></div>
                                                </div>
                        <div class='feed-img-too-high-tip' style='width:500px'></div>
                    </div>
                    <div class='feed-img-desc rich-content'>

        ";
        $result.=$content;
//        for($i=0;$i<count($content);$i++){
//            $result.="<p>".$content[$i]."</p>";
//        }
        $result.="
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
                                        <a class='feed-cmt' data-nid=" . $para['blog_id'] . ">回应</a>

                                        <a
                            data-type='photo' id='hot_point".$para['hot_point']."'
                            class='feed-nt'>热度(".$para['hot_point'].")</a>

										</div>
                                </div>
                            </div>
        ";
        return $result;
    }

    /**
     * @param $para 键值为blog_id; user_id;  user_head_pic; user_head_name; user_homepage;
     * video_host_type; video_id; embed_value; video_url; video_img_path ;reposet_path; video_title; hot_point
     * @param $content 富文本编辑器直接得到的内容，包含html标签
     * @param $tag tag的内容数组
     * @return string 返回渲染好的html
     */
    public function getVideoTpl($para,$content,$tag)
    {
        $result = "
        <div class='feed  feed-video' id='".$para['blog_id']."'>
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


                            <div class='feed-bd no-hd-content'>
                <div class='feed-ct'>
                    <div class='feed-video-ct'
                        data-host-type='".$para['video_host_type']."'
                        data-id='".$para['video_id']."'
                        data-embed-value='".$para['embed_value']."'
                        data-video-url='".$para['video_url']."'>
                        <!--此处加入embed的视频-->

                        <div class='feed-video-img-holder' ><img
                                imgsrc='".$para['video_img_path']."'
                                data-lazyload='true' class='feed-video-img'
                                src='".$para['video_img_path']."'>
                            <a class='feed-video-play'>播放</a></div>
                        <div class='feed-video-info'>
                            <div class='feed-video-cmt rich-content'>
                                <p>".$para['video_title']."</p>
								<p>&nbsp</p>
								<p class='edui-filter-align-left'><span class='text-img-holder'></span></p>

        ";
        $result.=$content;

        $result.="
             </div>
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
                                        <a class='feed-cmt' data-nid=" . $para['blog_id'] . ">回应</a>

                                        <a
                            data-type='photo' id='hot_point".$para['hot_point']."'
                            class='feed-nt'>热度(".$para['hot_point'].")</a>

										</div>
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


    public function getLinkTpl()
    {
        $content = "

        ";
        return $content;
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
}