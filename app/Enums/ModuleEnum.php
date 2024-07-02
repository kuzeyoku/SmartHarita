<?php

namespace App\Enums;

enum ModuleEnum: string
{
    case Message = "message";
    case Media = "media";
    case Menu = "menu";
    case Page = 'page';
    case Language = 'language';
    case Blog = "blog";
    case Category = "category";
    case Service = "service";
    case Brand = "brand";
    case Reference = "reference";
    case Product = "product";
    case Project = "project";
    case Slider = "slider";
    case Testimonial = "testimonial";
    case Popup = "popup";
    case User = "user";

    public function status(): bool
    {
        return match ($this) {
            self::User => true,
            self::Message => true,
            self::Media => true,
            self::Menu => true,
            self::Page => true,
            self::Language => true,
            self::Blog => true,
            self::Category => true,
            self::Service => true,
            self::Brand => true,
            self::Reference => true,
            self::Product => false,
            self::Project => true,
            self::Slider => true,
            self::Testimonial => true,
            self::Popup => true,
        };
    }

    public function title(): string
    {
        return __("admin/$this->value.title");
    }

    public function singleTitle(): string
    {
        return __("admin/$this->value.single_title");
    }

    public function icon(): string
    {
        return match ($this) {
            self::User => "users",
            self::Message => "mail",
            self::Media => "folder",
            self::Menu => "menu",
            self::Page => 'layout',
            self::Language => 'globe',
            self::Blog => "edit-3",
            self::Category => "list",
            self::Service => "bookmark",
            self::Brand => "tag",
            self::Reference => "refresh-cw",
            self::Product => "shopping-cart",
            self::Project => "briefcase",
            self::Slider => "image",
            self::Testimonial => "smile",
            self::Popup => "maximize-2",
        };
    }

    public function route(): string
    {
        return match ($this) {
            self::User => "user",
            self::Message => "message",
            self::Media => "media",
            self::Menu => "menu",
            self::Page => 'page',
            self::Language => 'language',
            self::Blog => "blog",
            self::Category => "category",
            self::Service => "service",
            self::Brand => "brand",
            self::Reference => "reference",
            self::Product => "product",
            self::Project => "project",
            self::Slider => "slider",
            self::Testimonial => "testimonial",
            self::Popup => "popup",
        };
    }

    public function folder(): string
    {
        return match ($this) {
            self::User => "user",
            self::Message => "message",
            self::Media => "media",
            self::Menu => "menu",
            self::Page => 'page',
            self::Language => "language",
            self::Blog => "blog",
            self::Category => "category",
            self::Service => "service",
            self::Brand => "brand",
            self::Reference => "reference",
            self::Product => "product",
            self::Project => "project",
            self::Slider => "slider",
            self::Testimonial => "testimonial",
            self::Popup => "popup",
        };
    }

    public function controller(): string
    {
        return match ($this) {
            self::User => \App\Http\Controllers\Admin\UserController::class,
            self::Message => \App\Http\Controllers\Admin\MessageController::class,
            self::Media => \App\Http\Controllers\Admin\MediaController::class,
            self::Menu => \App\Http\Controllers\Admin\MenuController::class,
            self::Page => \App\Http\Controllers\Admin\PageController::class,
            self::Language => \App\Http\Controllers\Admin\LanguageController::class,
            self::Blog => \App\Http\Controllers\Admin\BlogController::class,
            self::Category => \App\Http\Controllers\Admin\CategoryController::class,
            self::Service => \App\Http\Controllers\Admin\ServiceController::class,
            self::Brand => \App\Http\Controllers\Admin\BrandController::class,
            self::Reference => \App\Http\Controllers\Admin\ReferenceController::class,
            self::Product => \App\Http\Controllers\Admin\ProductController::class,
            self::Project => \App\Http\Controllers\Admin\ProjectController::class,
            self::Slider => \App\Http\Controllers\Admin\SliderController::class,
            self::Testimonial => \App\Http\Controllers\Admin\TestimonialController::class,
            self::Popup => \App\Http\Controllers\Admin\PopupController::class,
        };
    }

    public function model(): string
    {
        return match ($this) {
            self::User => \App\Models\User::class,
            self::Message => \App\Models\Message::class,
            self::Media => \Spatie\MediaLibrary\MediaCollections\Models\Media::class,
            self::Menu => \App\Models\Menu::class,
            self::Page => \App\Models\Page::class,
            self::Language => \App\Models\Language::class,
            self::Blog => \App\Models\Blog::class,
            self::Category => \App\Models\Category::class,
            self::Service => \App\Models\Service::class,
            self::Brand => \App\Models\Brand::class,
            self::Reference => \App\Models\Reference::class,
            self::Product => \App\Models\Product::class,
            self::Project => \App\Models\Project::class,
            self::Slider => \App\Models\Slider::class,
            self::Testimonial => \App\Models\Testimonial::class,
            self::Popup => \App\Models\Popup::class,
        };
    }

    public function menu(): array
    {
        return match ($this) {

            self::Message => [
                "index" => __("admin/$this->value.index"),
            ],
            self::Media => [
                "index" => __("admin/$this->value.index"),
            ],
            self::User => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Menu => [
                "index" => __("admin/$this->value.index"),
            ],
            self::Page => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Language => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Blog => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
                "comments" => __("admin/$this->value.comments"),
            ],
            self::Category => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Service => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Brand => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Reference => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Product => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Project => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Slider => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Testimonial => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Popup => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
        };
    }

    public static function toSelectArray(): array
    {
        return [
            self::Blog->value => self::Blog->title(),
            self::Service->value => self::Service->title(),
            self::Product->value => self::Product->title(),
            self::Project->value => self::Project->title(),
        ];
    }

    public function image(): array
    {
        return match ($this) {
            self::Blog => ["image" => ["width" => 1080, "height" => 720]],
            self::Service => ["image" => ["width" => 720, "height" => 480]],
            self::Brand => ["image" => ["width" => 150, "height" => 150]],
            self::Reference => ["image" => ["width" => 400, "height" => 400]],
            self::Product => ["image" => ["width" => 1080, "height" => 400]],
            self::Project => ["image" => ["width" => 1920, "height" => 1080]],
            self::Slider => ["image" => ["width" => 1920, "height" => 1080]],
            self::Testimonial => ["image" => ["width" => 300, "height" => 300]],
            self::Popup => ["image" => ["width" => 800, "height" => 600]],
        };
    }

    public function homeLimit()
    {
        return match ($this) {
            self::Blog => 3,
            self::Service => null,
            self::Brand => null,
            self::Reference => null,
            self::Product => 3,
            self::Project => null,
            self::Slider => null,
            self::Testimonial => null,
            self::Popup => null,
        };
    }

    public function IMAGE_COLLECTION()
    {
        return match ($this) {
            self::Product => "images",
            self::Project => "images",
        };
    }

    public function COVER_COLLECTION()
    {
        return match ($this) {
            self::Blog => "cover",
            self::Service => "cover",
            self::Brand => "cover",
            self::Reference => "cover",
            self::Product => "cover",
            self::Project => "cover",
            self::Slider => "cover",
            self::Testimonial => "avatar",
            self::Popup => "cover",
        };
    }

    public function DOCUMENT_COLLECTION()
    {
        return match ($this) {
            self::Service => "documents",
            self::Product => "documents",
            self::Project => "documents",
        };
    }
}
