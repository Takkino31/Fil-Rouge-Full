<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/admin/groupes' => [
            [['_route' => 'post_grp_app', '_controller' => 'App\\Controller\\GroupeApprenantController::addGroupeApprenant'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'api_groupe_apprenants_get_groupes_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeApprenant', '_api_collection_operation_name' => 'get_groupes'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/admin/referentiels' => [
            [['_route' => 'add_referentiels', '_controller' => 'App\\Controller\\ReferentielController::add_referentiels'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'api_referentiels_get_referentiels_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_collection_operation_name' => 'get_referentiels'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_referentiels_add_referentiels_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_collection_operation_name' => 'add_referentiels'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/admin/users' => [
            [['_route' => 'add_user', '_controller' => 'App\\Controller\\UserController::add_user'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'api_users_get_users_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'get_users'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/admin/nbrusers' => [
            [['_route' => 'get_users_nbr', '_controller' => 'App\\Controller\\UserController::nbrItem'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_users_get_users_nbr_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'get_users_nbr'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/apprenants' => [[['_route' => 'api_apprenants_get_apprenants_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Apprenant', '_api_collection_operation_name' => 'get_apprenants'], null, ['GET' => 0], null, false, false, null]],
        '/api/admin/tags' => [
            [['_route' => 'api_tags_get_tags_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Tag', '_api_collection_operation_name' => 'get_tags'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_tags_add_tags_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Tag', '_api_collection_operation_name' => 'add_tags'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/admin/grptags' => [
            [['_route' => 'api_groupe_tags_get_grp_tags_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeTag', '_api_collection_operation_name' => 'get_grp_tags'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_groupe_tags_add_grp_tags_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeTag', '_api_collection_operation_name' => 'add_grp_tags'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/admin/competences' => [
            [['_route' => 'api_competences_get_skills_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_collection_operation_name' => 'get_skills'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_competences_post_skills_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_collection_operation_name' => 'post_skills'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/admin/profils' => [
            [['_route' => 'api_profils_get_profils_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profil', '_api_collection_operation_name' => 'get_profils'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_profils_add_profil_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profil', '_api_collection_operation_name' => 'add_profil'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/admin/groupecompetences' => [
            [['_route' => 'api_groupe_competences_get_groupes_skills_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_collection_operation_name' => 'get_groupes_skills'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_groupe_competences_post_groupes_skills_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_collection_operation_name' => 'post_groupes_skills'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/admin/groupecompetences/competences' => [[['_route' => 'api_groupe_competences_get_skill_groupes_skills_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_collection_operation_name' => 'get_skill_groupes_skills'], null, ['GET' => 0], null, false, false, null]],
        '/api/formateurs' => [[['_route' => 'api_formateurs_get_formateurs_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Formateur', '_api_collection_operation_name' => 'get_formateurs'], null, ['GET' => 0], null, false, false, null]],
        '/api/login_check' => [[['_route' => 'authentication_token'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api(?'
                    .'|/admin/(?'
                        .'|groupes/([^/]++)(*:75)'
                        .'|referentiels/([^/]++)(?'
                            .'|(*:106)'
                            .'|/groupecompetences/([^/]++)(*:141)'
                        .')'
                        .'|users/([^/]++)(*:164)'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:201)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:232)'
                        .'|contexts/(.+)(?:\\.([^/]++))?(*:268)'
                        .'|a(?'
                            .'|pprenant/([^/]++)(*:297)'
                            .'|dmin(?'
                                .'|/(?'
                                    .'|users/([^/]++)(?'
                                        .'|(*:333)'
                                    .')'
                                    .'|tags/([^/]++)(?'
                                        .'|(*:358)'
                                    .')'
                                    .'|gr(?'
                                        .'|oupe(?'
                                            .'|s/(?'
                                                .'|apprenants(*:394)'
                                                .'|([^/]++)(?'
                                                    .'|(*:413)'
                                                .')'
                                            .')'
                                            .'|competences/([^/]++)(?'
                                                .'|(*:446)'
                                            .')'
                                            .'|_competences/([^/]++)/competences(?:\\.([^/]++))?(*:503)'
                                        .')'
                                        .'|ptags/([^/]++)(?'
                                            .'|(*:529)'
                                        .')'
                                    .')'
                                    .'|referentiels/(?'
                                        .'|groupecompetences(*:572)'
                                        .'|([^/]++)(?'
                                            .'|(*:591)'
                                            .'|/groupecompetences/([^/]++)(*:626)'
                                            .'|(*:634)'
                                        .')'
                                    .')'
                                    .'|competences/([^/]++)(?'
                                        .'|(*:667)'
                                    .')'
                                    .'|profils/([^/]++)(?'
                                        .'|(*:695)'
                                        .'|/users(?:\\.([^/]++))?(*:724)'
                                    .')'
                                .')'
                                .'|s(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:756)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:794)'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|pro(?'
                            .'|mos(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:836)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:874)'
                                .')'
                            .')'
                            .'|fil_sorties(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:916)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:954)'
                                .')'
                            .')'
                        .')'
                        .'|formateurs/([^/]++)(?'
                            .'|(*:987)'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        75 => [[['_route' => 'put_grp_app', '_controller' => 'App\\Controller\\GroupeApprenantController::putGroupeApprenant'], ['id'], ['PUT' => 0], null, false, true, null]],
        106 => [[['_route' => 'put_referentiels', '_controller' => 'App\\Controller\\ReferentielController::put_referentiel'], ['id'], ['PUT' => 0], null, false, true, null]],
        141 => [[['_route' => 'get_referentiel_grp_skills_only', '_controller' => 'App\\Controller\\ReferentielController::read_referentiel_grp_skills_only'], ['id_ref', 'id_grp_skills'], ['GET' => 0], null, false, true, null]],
        164 => [[['_route' => 'put_user', '_controller' => 'App\\Controller\\UserController::put_user'], ['id'], ['PUT' => 0, 'POST' => 1], null, false, true, null]],
        201 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        232 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        268 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        297 => [[['_route' => 'api_apprenants_get_apprenant_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Apprenant', '_api_item_operation_name' => 'get_apprenant'], ['id'], ['GET' => 0], null, false, true, null]],
        333 => [
            [['_route' => 'api_apprenants_put_apprenants_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Apprenant', '_api_item_operation_name' => 'put_apprenants'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_users_get_user_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'get_user'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_put_user_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'put_user'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_users_delete_user_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'delete_user'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        358 => [
            [['_route' => 'api_tags_get_tag_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Tag', '_api_item_operation_name' => 'get_tag'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_tags_put_tag_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Tag', '_api_item_operation_name' => 'put_tag'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_tags_delete_tag_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Tag', '_api_item_operation_name' => 'delete_tag'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        394 => [[['_route' => 'api_groupe_apprenants_get_groupes_apprenants_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeApprenant', '_api_collection_operation_name' => 'get_groupes_apprenants'], [], ['GET' => 0], null, false, false, null]],
        413 => [
            [['_route' => 'api_groupe_apprenants_get_grp_id_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeApprenant', '_api_item_operation_name' => 'get_grp_id'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_groupe_apprenants_delete_grp_id_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeApprenant', '_api_item_operation_name' => 'delete_grp_id'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        446 => [
            [['_route' => 'api_groupe_competences_get_groupes_skills_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_item_operation_name' => 'get_groupes_skills'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_groupe_competences_put_groupes_skills_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_item_operation_name' => 'put_groupes_skills'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_groupe_competences_delete_groupes_skills_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeCompetence', '_api_item_operation_name' => 'delete_groupes_skills'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        503 => [[['_route' => 'api_groupe_competences_competences_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_subresource_operation_name' => 'api_groupe_competences_competences_get_subresource', '_api_subresource_context' => ['property' => 'competences', 'identifiers' => [['id', 'App\\Entity\\GroupeCompetence', true]], 'collection' => true, 'operationId' => 'api_groupe_competences_competences_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        529 => [
            [['_route' => 'api_groupe_tags_get_grptag_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeTag', '_api_item_operation_name' => 'get_grptag'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_groupe_tags_put_grptag_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeTag', '_api_item_operation_name' => 'put_grptag'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_groupe_tags_delete_grptag_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\GroupeTag', '_api_item_operation_name' => 'delete_grptag'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        572 => [[['_route' => 'api_referentiels_get_grpskills_referentiels_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_collection_operation_name' => 'get_grpskills_referentiels'], [], ['GET' => 0], null, false, false, null]],
        591 => [[['_route' => 'api_referentiels_get_referentiel_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_item_operation_name' => 'get_referentiel'], ['id'], ['GET' => 0], null, false, true, null]],
        626 => [[['_route' => 'api_referentiels_get_referentiel_grp_skills_only_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_item_operation_name' => 'get_referentiel_grp_skills_only'], ['id_ref', 'id_grp_skills'], ['GET' => 0], null, false, true, null]],
        634 => [
            [['_route' => 'api_referentiels_put_referentiels_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_item_operation_name' => 'put_referentiels'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_referentiels_delete_referentiel_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Referentiel', '_api_item_operation_name' => 'delete_referentiel'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        667 => [
            [['_route' => 'api_competences_get_skill_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_item_operation_name' => 'get_skill'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_competences_put_skill_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_item_operation_name' => 'put_skill'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_competences_delete_skill_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Competence', '_api_item_operation_name' => 'delete_skill'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        695 => [
            [['_route' => 'api_profils_get_profil_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profil', '_api_item_operation_name' => 'get_profil'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_profils_put_profil_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profil', '_api_item_operation_name' => 'put_profil'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_profils_delete_profil_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profil', '_api_item_operation_name' => 'delete_profil'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        724 => [[['_route' => 'api_profils_users_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_subresource_operation_name' => 'api_profils_users_get_subresource', '_api_subresource_context' => ['property' => 'users', 'identifiers' => [['id', 'App\\Entity\\Profil', true]], 'collection' => true, 'operationId' => 'api_profils_users_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        756 => [
            [['_route' => 'api_admins_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Admin', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_admins_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Admin', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        794 => [
            [['_route' => 'api_admins_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Admin', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_admins_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Admin', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_admins_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Admin', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_admins_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Admin', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        836 => [
            [['_route' => 'api_promos_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_promos_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        874 => [
            [['_route' => 'api_promos_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_promos_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_promos_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_promos_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Promo', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        916 => [
            [['_route' => 'api_profil_sorties_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\ProfilSortie', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_profil_sorties_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\ProfilSortie', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        954 => [
            [['_route' => 'api_profil_sorties_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\ProfilSortie', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_profil_sorties_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\ProfilSortie', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_profil_sorties_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\ProfilSortie', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_profil_sorties_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\ProfilSortie', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        987 => [
            [['_route' => 'api_formateurs_get_formateur_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Formateur', '_api_item_operation_name' => 'get_formateur'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_formateurs_put_formateur_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Formateur', '_api_item_operation_name' => 'put_formateur'], ['id'], ['PUT' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
