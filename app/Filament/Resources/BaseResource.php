<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;

abstract class BaseResource extends Resource
{
    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();
        $query = parent::getEloquentQuery();

        if (!$user || $user->role === 'admin') {
            return $query;
        }

        if ($user->role === 'merchant') {
            $model = static::getModel();

            if (self::hasColumn($model, 'user_id')) {
                return $query->where('user_id', $user->id);
            }

            if (self::hasColumn($model, 'merchant_id')) {
                $merchantId = $user->merchant?->id;
                if ($merchantId) {
                    return $query->where('merchant_id', $merchantId);
                }
            }
        }

        return $query;
    }

    protected static function hasColumn(string $model, string $column): bool
    {
        return \Schema::hasColumn((new $model)->getTable(), $column);
    }
}
