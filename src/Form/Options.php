<?php

namespace Kirby\Form;

use Kirby\Cms\App;
use Kirby\Toolkit\I18n;

/**
 * Foundation for the Options query
 * classes, that are used to generate
 * options arrays for select fields,
 * radio boxes, checkboxes and more.
 *
 * @package   Kirby Form
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Options
{
    /**
     * Returns the classes of predefined Kirby objects
     *
     * @return array
     */
    protected static function aliases(): array
    {
        return [
            'Kirby\Cms\File'            => 'file',
            'Kirby\Toolkit\Obj'         => 'arrayItem',
            'Kirby\Cms\Block'           => 'block',
            'Kirby\Cms\Page'            => 'page',
            'Kirby\Cms\StructureObject' => 'structureItem',
            'Kirby\Cms\User'            => 'user',
        ];
    }

    /**
     * Get options from API
     *
     * @param array|string $api
     * @param \Kirby\Cms\Model|null $model
     * @return array
     */
    public static function api($api, $model = null): array
    {
        $model ??= App::instance()->site();

        if (is_array($api) === true) {
            $fetch = $api['fetch'] ?? null;
            $text  = $api['text']  ?? null;
            $value = $api['value'] ?? null;
            $url   = $api['url']   ?? null;
        }

        $api = new OptionsApi([
            'data'  => static::data($model),
            'fetch' => $fetch ?? null,
            'url'   => $url   ?? $api,
            'text'  => $text  ?? '{{ item.value }}',
            'value' => $value ?? '{{ item.key }}'
        ]);

        return $api->options();
    }

    /**
     * Returns data array for template strings
     *
     * @param \Kirby\Cms\Model $model
     * @return array
     */
    protected static function data($model): array
    {
        $kirby = $model->kirby();

        // default data setup
        $data = [
            'kirby' => $kirby,
            'site'  => $kirby->site(),
            'users' => $kirby->users(),
        ];

        // add the model by the proper alias
        foreach (static::aliases() as $className => $alias) {
            if (is_a($model, $className) === true) {
                $data[$alias] = $model;
            }
        }

        return $data;
    }

    /**
     * Brings options by supporting both api and query
     *
     * @param $options
     * @param array $props
     * @param \Kirby\Cms\Model|null $model
     * @return array
     */
    public static function factory($options, array $props = [], $model = null): array
    {

        // get options based on type/shorthands
        switch ($options) {
            case 'api':
                $options = static::api($props['api'], $model);
                break;
            case 'query':
                $options = static::query($props['query'], $model);
                break;
            case 'children':
            case 'grandChildren':
            case 'siblings':
            case 'index':
            case 'files':
            case 'images':
            case 'documents':
            case 'videos':
            case 'audio':
            case 'code':
            case 'archives':
                $options = static::query('page.' . $options, $model);
                break;
            case 'pages':
                $options = static::query('site.index', $model);
                break;
        }

        if (is_array($options) === false) {
            return [];
        }

        $result = [];

        // prepare all options to have standardized format
        foreach ($options as $key => $option) {
            // ensure that option is an array with a `value` key
            if (
                is_array($option) === false ||
                isset($option['value']) === false
            ) {
                $option = [
                    'value' => is_int($key) ? $option : $key,
                    'text'  => $option
                ];
            }

            // translate the option text
            if (is_array($option['text']) === true) {
                $option['text'] = I18n::translate(
                    $option['text'],
                    $option['text']
                );
            }

            // add the option to the list
            $result[] = $option;
        }

        return $result;
    }

    /**
     * Returns options from resolved query syntax
     *
     * @param $query
     * @param \Kirby\Cms\Model|null $model
     * @return array
     */
    public static function query($query, $model = null): array
    {
        $model ??= App::instance()->site();

        // default text setup
        $text = [
            'arrayItem'     => '{{ arrayItem.value }}',
            'block'         => '{{ block.type }}: {{ block.id }}',
            'file'          => '{{ file.filename }}',
            'page'          => '{{ page.title }}',
            'structureItem' => '{{ structureItem.title }}',
            'user'          => '{{ user.username }}',
        ];

        // default value setup
        $value = [
            'arrayItem'     => '{{ arrayItem.value }}',
            'block'         => '{{ block.id }}',
            'file'          => '{{ file.id }}',
            'page'          => '{{ page.id }}',
            'structureItem' => '{{ structureItem.id }}',
            'user'          => '{{ user.email }}',
        ];

        // resolve array query setup
        if (is_array($query) === true) {
            $text  = $query['text']  ?? $text;
            $value = $query['value'] ?? $value;
            $query = $query['fetch'] ?? null;
        }

        $query = new OptionsQuery([
            'aliases' => static::aliases(),
            'data'    => static::data($model),
            'query'   => $query,
            'text'    => $text,
            'value'   => $value
        ]);

        return $query->options();
    }
}
