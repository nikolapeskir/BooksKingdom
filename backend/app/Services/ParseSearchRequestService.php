<?php

namespace App\Services;

class ParseSearchRequestService
{
    public static function parse($request)
    {
        $filter = [];

        foreach ($request['filterColumns'] as $filterColumn) {
            if ($filterColumn['value'] != null) {
                $filter['filter'][$filterColumn['column']] = $filterColumn['value'];
            }
        }

        if ($request['search'] != '') {
            $filter['filter']['title'] = $request['search'];
            $filter['filter']['name'] = $request['search'];
        }

        if ($request->has('sortBy')) {
            $sort = '';
            foreach ($request['sortBy'] as $key => $sortByColumn) {
                $sort .= ($request['sortDesc'][$key] === 'false' ? '-' : '') . $sortByColumn . ',';
            }
            $filter['sort'] = $sort;
        }

        return $filter;
    }
}
