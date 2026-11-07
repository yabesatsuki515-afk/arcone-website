@extends('layouts.site', ['offsetHeader' => true])

@section('page-title', 'サービス')

@section('meta-description', 'ARC ONE（アークワン）のホームページ制作サービス。高品質・短納期・低価格でフルカスタムのWebサイトを提供。LP制作、名刺制作、ロゴ制作も対応。公開後のサポート体制も充実。')

@section('canonical', route('services'))

@section('main')
    @include('partials.services-content')
@endsection
