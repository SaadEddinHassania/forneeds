initializing infyom
php artisan  infyom:publish 
echo "scaffolding Users"
php artisan infyom:scaffold User --fromTable --tableName=users
echo "done"
echo "scaffolding Sectors"
php artisan infyom:scaffold Sector --fromTable --tableName=sectors
echo "done"
echo "scaffolding service_types"
php artisan infyom:scaffold ServiceType --fromTable --tableName=service_types
echo "done"
echo "scaffolding service_provider_types"
php artisan infyom:scaffold ServiceProviderType --fromTable --tableName=service_provider_types
echo "done"
echo "scaffolding location_metas"
php artisan infyom:scaffold LocationMeta --fromTable --tableName=location_metas
echo "done"
echo "scaffolding areas"
php artisan infyom:scaffold Area --fromTable --tableName=areas
echo "done"
echo "scaffolding cities"
php artisan infyom:scaffold City --fromTable --tableName=cities
echo "done"
echo "scaffolding districts"
php artisan infyom:scaffold District --fromTable --tableName=districts
echo "done"
echo "scaffolding streets"
php artisan infyom:scaffold Street --fromTable --tableName=streets
echo "done"
echo "scaffolding services"
php artisan infyom:scaffold Service --fromTable --tableName=services
echo "done"
echo "scaffolding marginalized_situations"
php artisan infyom:scaffold MarginalizedSituation --fromTable --tableName=marginalized_situations
echo "done"
echo "scaffolding projects"
php artisan infyom:scaffold Project --fromTable --tableName=projects
echo "done"
echo "scaffolding survey_metas"
php artisan infyom:scaffold SurveyMetas --fromTable --tableName=survey_metas
echo "done"
echo "scaffolding surveys"
php artisan infyom:scaffold Survey --fromTable --tableName=surveys
echo "done"
echo "scaffolding questions"
php artisan infyom:scaffold Question --fromTable --tableName=questions
echo "done"
echo "scaffolding answers"
php artisan infyom:scaffold Answer --fromTable --tableName=answers
echo "done"
echo "scaffolding services"
php artisan infyom:scaffold Service --fromTable --tableName=services
echo "done"
echo "scaffolding service_requests"
php artisan infyom:scaffold ServiceRequests --fromTable --tableName=service_requests
echo "done"

echo "all done ..."