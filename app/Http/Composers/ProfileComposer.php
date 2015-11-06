<?php  namespace App\Http\Composers;

use App\Services\PostTypeService;
use Illuminate\Contracts\View\View;

/**
 * Created by PhpStorm.
 * User: Jialei Pei
 * Date: 6/11/2015
 * Time: 9:48 PM
 */
class ProfileComposer
{
    public function __construct(PostTypeService $postTypeService) {
        $this->postTypeService = $postTypeService;
    }

    public function Compose(View $view) {
        $post_types = $this->postTypeService->getAllType();

        $view->with('post_types', $post_types);
    }

}