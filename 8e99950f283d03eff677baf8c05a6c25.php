<?php return array (
  'GET' => 
  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
     'literals' => 
    array (
      '/addon' => 'addon',
      '/addon/linkers' => 'addon_linkers',
      '/hook_events' => 'hook_events',
      '/repositories' => 'repositories',
      '/snippets' => 'snippets',
      '/teams' => 'teams',
      '/user' => 'user',
      '/user/emails' => 'user_emails',
      '/user/permissions/repositories' => 'user_permissions_repositories',
      '/user/permissions/teams' => 'user_permissions_teams',
      '/user/permissions/workspaces' => 'user_permissions_workspaces',
      '/workspaces' => 'workspaces',
    ),
     'prefixes' => 
    array (
      '/addon/' => 
      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
         'literals' => 
        array (
        ),
         'prefixes' => 
        array (
          'linkers/' => 
          HackRouting\PrefixMatching\PrefixMap::__set_state(array(
             'literals' => 
            array (
            ),
             'prefixes' => 
            array (
            ),
             'regexps' => 
            array (
              '(?<linker_key>[^/]+)' => 
              HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                 'map' => 
                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                   'literals' => 
                  array (
                    '' => 'addon_linkers_linker_key',
                    '/values' => 'addon_linkers_linker_key_values',
                  ),
                   'prefixes' => 
                  array (
                    '/values/' => 
                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                       'literals' => 
                      array (
                      ),
                       'prefixes' => 
                      array (
                      ),
                       'regexps' => 
                      array (
                        '(?<value_id>[^/]+)' => 
                        HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                           'map' => NULL,
                           'responder' => 'addon_linkers_linker_key_values_value_id',
                        )),
                      ),
                    )),
                  ),
                   'regexps' => 
                  array (
                  ),
                )),
                 'responder' => NULL,
              )),
            ),
          )),
        ),
         'regexps' => 
        array (
        ),
      )),
      '/hook_e' => 
      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
         'literals' => 
        array (
        ),
         'prefixes' => 
        array (
          'vents/' => 
          HackRouting\PrefixMatching\PrefixMap::__set_state(array(
             'literals' => 
            array (
            ),
             'prefixes' => 
            array (
            ),
             'regexps' => 
            array (
              '(?<subject_type>[^/]+)' => 
              HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                 'map' => NULL,
                 'responder' => 'hook_events_subject_type',
              )),
            ),
          )),
        ),
         'regexps' => 
        array (
        ),
      )),
      '/pullre' => 
      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
         'literals' => 
        array (
        ),
         'prefixes' => 
        array (
          'quests/' => 
          HackRouting\PrefixMatching\PrefixMap::__set_state(array(
             'literals' => 
            array (
            ),
             'prefixes' => 
            array (
            ),
             'regexps' => 
            array (
              '(?<selected_user>[^/]+)' => 
              HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                 'map' => NULL,
                 'responder' => 'pullrequests_selected_user',
              )),
            ),
          )),
        ),
         'regexps' => 
        array (
        ),
      )),
      '/reposi' => 
      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
         'literals' => 
        array (
        ),
         'prefixes' => 
        array (
          'tories/' => 
          HackRouting\PrefixMatching\PrefixMap::__set_state(array(
             'literals' => 
            array (
            ),
             'prefixes' => 
            array (
            ),
             'regexps' => 
            array (
              '(?<workspace>[^/]+)' => 
              HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                 'map' => 
                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                   'literals' => 
                  array (
                    '' => 'repositories_workspace',
                  ),
                   'prefixes' => 
                  array (
                    '/' => 
                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                       'literals' => 
                      array (
                      ),
                       'prefixes' => 
                      array (
                      ),
                       'regexps' => 
                      array (
                        '(?<repo_slug>[^/]+)' => 
                        HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                           'map' => 
                          HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                             'literals' => 
                            array (
                              '' => 'repositories_workspace_repo_slug',
                              '/branch-restrictions' => 'repositories_workspace_repo_slug_branch_restrictions',
                              '/branching-model' => 'repositories_workspace_repo_slug_branching_model',
                              '/branching-model/settings' => 'repositories_workspace_repo_slug_branching_model_settings',
                              '/commits' => 'repositories_workspace_repo_slug_commits',
                              '/components' => 'repositories_workspace_repo_slug_components',
                              '/default-reviewers' => 'repositories_workspace_repo_slug_default_reviewers',
                              '/deploy-keys' => 'repositories_workspace_repo_slug_deploy_keys',
                              '/deployments/' => 'repositories_workspace_repo_slug_deployments',
                              '/downloads' => 'repositories_workspace_repo_slug_downloads',
                              '/environments/' => 'repositories_workspace_repo_slug_environments',
                              '/forks' => 'repositories_workspace_repo_slug_forks',
                              '/hooks' => 'repositories_workspace_repo_slug_hooks',
                              '/issues' => 'repositories_workspace_repo_slug_issues',
                              '/issues/export' => 'repositories_workspace_repo_slug_issues_export',
                              '/issues/import' => 'repositories_workspace_repo_slug_issues_import',
                              '/milestones' => 'repositories_workspace_repo_slug_milestones',
                              '/pipelines-config/caches/' => 'repositories_workspace_repo_slug_pipelines_config_caches',
                              '/pipelines/' => 'repositories_workspace_repo_slug_pipelines',
                              '/pipelines_config' => 'repositories_workspace_repo_slug_pipelines_config',
                              '/pipelines_config/build_number' => 'repositories_workspace_repo_slug_pipelines_config_build_number',
                              '/pipelines_config/schedules/' => 'repositories_workspace_repo_slug_pipelines_config_schedules',
                              '/pipelines_config/ssh/key_pair' => 'repositories_workspace_repo_slug_pipelines_config_ssh_key_pair',
                              '/pipelines_config/ssh/known_hosts/' => 'repositories_workspace_repo_slug_pipelines_config_ssh_known_hosts',
                              '/pipelines_config/variables/' => 'repositories_workspace_repo_slug_pipelines_config_variables',
                              '/pullrequests' => 'repositories_workspace_repo_slug_pullrequests',
                              '/pullrequests/activity' => 'repositories_workspace_repo_slug_pullrequests_activity',
                              '/refs' => 'repositories_workspace_repo_slug_refs',
                              '/refs/branches' => 'repositories_workspace_repo_slug_refs_branches',
                              '/refs/tags' => 'repositories_workspace_repo_slug_refs_tags',
                              '/src' => 'repositories_workspace_repo_slug_src',
                              '/versions' => 'repositories_workspace_repo_slug_versions',
                              '/watchers' => 'repositories_workspace_repo_slug_watchers',
                            ),
                             'prefixes' => 
                            array (
                              '/bran' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'ch-restrictions/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<id>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_branch_restrictions_id',
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/comm' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'it/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<commit>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => 
                                        HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                           'literals' => 
                                          array (
                                            '' => 'repositories_workspace_repo_slug_commit_commit',
                                            '/approve' => 'repositories_workspace_repo_slug_commit_commit_approve',
                                            '/comments' => 'repositories_workspace_repo_slug_commit_commit_comments',
                                            '/pullrequests' => 'repositories_workspace_repo_slug_commit_commit_pullrequests',
                                            '/reports' => 'repositories_workspace_repo_slug_commit_commit_reports',
                                            '/statuses' => 'repositories_workspace_repo_slug_commit_commit_statuses',
                                            '/statuses/build' => 'repositories_workspace_repo_slug_commit_commit_statuses_build',
                                          ),
                                           'prefixes' => 
                                          array (
                                            '/comments' => 
                                            HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                               'literals' => 
                                              array (
                                              ),
                                               'prefixes' => 
                                              array (
                                                '/' => 
                                                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                                   'literals' => 
                                                  array (
                                                  ),
                                                   'prefixes' => 
                                                  array (
                                                  ),
                                                   'regexps' => 
                                                  array (
                                                    '(?<comment_id>[^/]+)' => 
                                                    HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                                       'map' => NULL,
                                                       'responder' => 'repositories_workspace_repo_slug_commit_commit_comments_comment_id',
                                                    )),
                                                  ),
                                                )),
                                              ),
                                               'regexps' => 
                                              array (
                                              ),
                                            )),
                                            '/properti' => 
                                            HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                               'literals' => 
                                              array (
                                              ),
                                               'prefixes' => 
                                              array (
                                                'es/' => 
                                                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                                   'literals' => 
                                                  array (
                                                  ),
                                                   'prefixes' => 
                                                  array (
                                                  ),
                                                   'regexps' => 
                                                  array (
                                                    '(?<app_key>[^/]+)/(?<property_name>[^/]+)' => 
                                                    HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                                       'map' => NULL,
                                                       'responder' => 'repositories_workspace_repo_slug_commit_commit_properties_app_key_property_name',
                                                    )),
                                                  ),
                                                )),
                                              ),
                                               'regexps' => 
                                              array (
                                              ),
                                            )),
                                            '/reports/' => 
                                            HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                               'literals' => 
                                              array (
                                              ),
                                               'prefixes' => 
                                              array (
                                              ),
                                               'regexps' => 
                                              array (
                                                '(?<reportId>[^/]+)' => 
                                                HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                                   'map' => 
                                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                                     'literals' => 
                                                    array (
                                                      '' => 'repositories_workspace_repo_slug_commit_commit_reports_reportId',
                                                      '/annotations' => 'repositories_workspace_repo_slug_commit_commit_reports_reportId_annotations',
                                                    ),
                                                     'prefixes' => 
                                                    array (
                                                      '/annotations/' => 
                                                      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                                         'literals' => 
                                                        array (
                                                        ),
                                                         'prefixes' => 
                                                        array (
                                                        ),
                                                         'regexps' => 
                                                        array (
                                                          '(?<annotationId>[^/]+)' => 
                                                          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                                             'map' => NULL,
                                                             'responder' => 'repositories_workspace_repo_slug_commit_commit_reports_reportId_annotations_annotationId',
                                                          )),
                                                        ),
                                                      )),
                                                    ),
                                                     'regexps' => 
                                                    array (
                                                    ),
                                                  )),
                                                   'responder' => NULL,
                                                )),
                                              ),
                                            )),
                                            '/statuses' => 
                                            HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                               'literals' => 
                                              array (
                                              ),
                                               'prefixes' => 
                                              array (
                                                '/build/' => 
                                                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                                   'literals' => 
                                                  array (
                                                  ),
                                                   'prefixes' => 
                                                  array (
                                                  ),
                                                   'regexps' => 
                                                  array (
                                                    '(?<key>[^/]+)' => 
                                                    HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                                       'map' => NULL,
                                                       'responder' => 'repositories_workspace_repo_slug_commit_commit_statuses_build_key',
                                                    )),
                                                  ),
                                                )),
                                              ),
                                               'regexps' => 
                                              array (
                                              ),
                                            )),
                                          ),
                                           'regexps' => 
                                          array (
                                          ),
                                        )),
                                         'responder' => NULL,
                                      )),
                                    ),
                                  )),
                                  'its' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                      '/' => 
                                      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                         'literals' => 
                                        array (
                                        ),
                                         'prefixes' => 
                                        array (
                                        ),
                                         'regexps' => 
                                        array (
                                          '(?<revision>[^/]+)' => 
                                          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                             'map' => NULL,
                                             'responder' => 'repositories_workspace_repo_slug_commits_revision',
                                          )),
                                        ),
                                      )),
                                    ),
                                     'regexps' => 
                                    array (
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/comp' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'onents/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<component_id>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_components_component_id',
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/defa' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'ult-reviewers/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<target_username>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_default_reviewers_target_username',
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/depl' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'oy-keys/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<key_id>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_deploy_keys_key_id',
                                      )),
                                    ),
                                  )),
                                  'oyments/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<deployment_uuid>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_deployments_deployment_uuid',
                                      )),
                                    ),
                                  )),
                                  'oyments_' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                      'config/environments/' => 
                                      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                         'literals' => 
                                        array (
                                        ),
                                         'prefixes' => 
                                        array (
                                        ),
                                         'regexps' => 
                                        array (
                                          '(?<environment_uuid>[^/]+)' => 
                                          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                             'map' => 
                                            HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                               'literals' => 
                                              array (
                                                '/variables' => 'repositories_workspace_repo_slug_deployments_config_environments_environment_uuid_variables',
                                              ),
                                               'prefixes' => 
                                              array (
                                                '/variables/' => 
                                                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                                   'literals' => 
                                                  array (
                                                  ),
                                                   'prefixes' => 
                                                  array (
                                                  ),
                                                   'regexps' => 
                                                  array (
                                                    '(?<variable_uuid>[^/]+)' => 
                                                    HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                                       'map' => NULL,
                                                       'responder' => 'repositories_workspace_repo_slug_deployments_config_environments_environment_uuid_variables_variable_uuid',
                                                    )),
                                                  ),
                                                )),
                                              ),
                                               'regexps' => 
                                              array (
                                              ),
                                            )),
                                             'responder' => NULL,
                                          )),
                                        ),
                                      )),
                                    ),
                                     'regexps' => 
                                    array (
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/diff' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  '/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<spec>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_diff_spec',
                                      )),
                                    ),
                                  )),
                                  's' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                      'tat/' => 
                                      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                         'literals' => 
                                        array (
                                        ),
                                         'prefixes' => 
                                        array (
                                        ),
                                         'regexps' => 
                                        array (
                                          '(?<spec>[^/]+)' => 
                                          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                             'map' => NULL,
                                             'responder' => 'repositories_workspace_repo_slug_diffstat_spec',
                                          )),
                                        ),
                                      )),
                                    ),
                                     'regexps' => 
                                    array (
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/down' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'loads/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<filename>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_downloads_filename',
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/envi' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'ronments/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<environment_uuid>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => 
                                        HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                           'literals' => 
                                          array (
                                            '' => 'repositories_workspace_repo_slug_environments_environment_uuid',
                                            '/changes/' => 'repositories_workspace_repo_slug_environments_environment_uuid_changes',
                                          ),
                                           'prefixes' => 
                                          array (
                                          ),
                                           'regexps' => 
                                          array (
                                          ),
                                        )),
                                         'responder' => NULL,
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/file' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'history/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<commit>[^/]+)/(?<path>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_filehistory_commit_path',
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/hook' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  's/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<uid>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_hooks_uid',
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/issu' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'es/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                      'export/' => 
                                      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                         'literals' => 
                                        array (
                                        ),
                                         'prefixes' => 
                                        array (
                                        ),
                                         'regexps' => 
                                        array (
                                          '(?<repo_name>[^/]+)\\-issues\\-(?<task_id>[^/]+)\\.zip' => 
                                          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                             'map' => NULL,
                                             'responder' => 'repositories_workspace_repo_slug_issues_export_repo_name_issues_task_id_zip',
                                          )),
                                        ),
                                      )),
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<issue_id>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => 
                                        HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                           'literals' => 
                                          array (
                                            '' => 'repositories_workspace_repo_slug_issues_issue_id',
                                            '/attachments' => 'repositories_workspace_repo_slug_issues_issue_id_attachments',
                                            '/changes' => 'repositories_workspace_repo_slug_issues_issue_id_changes',
                                            '/comments' => 'repositories_workspace_repo_slug_issues_issue_id_comments',
                                            '/vote' => 'repositories_workspace_repo_slug_issues_issue_id_vote',
                                            '/watch' => 'repositories_workspace_repo_slug_issues_issue_id_watch',
                                          ),
                                           'prefixes' => 
                                          array (
                                            '/attachme' => 
                                            HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                               'literals' => 
                                              array (
                                              ),
                                               'prefixes' => 
                                              array (
                                                'nts/' => 
                                                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                                   'literals' => 
                                                  array (
                                                  ),
                                                   'prefixes' => 
                                                  array (
                                                  ),
                                                   'regexps' => 
                                                  array (
                                                    '(?<path>[^/]+)' => 
                                                    HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                                       'map' => NULL,
                                                       'responder' => 'repositories_workspace_repo_slug_issues_issue_id_attachments_path',
                                                    )),
                                                  ),
                                                )),
                                              ),
                                               'regexps' => 
                                              array (
                                              ),
                                            )),
                                            '/changes/' => 
                                            HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                               'literals' => 
                                              array (
                                              ),
                                               'prefixes' => 
                                              array (
                                              ),
                                               'regexps' => 
                                              array (
                                                '(?<change_id>[^/]+)' => 
                                                HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                                   'map' => NULL,
                                                   'responder' => 'repositories_workspace_repo_slug_issues_issue_id_changes_change_id',
                                                )),
                                              ),
                                            )),
                                            '/comments' => 
                                            HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                               'literals' => 
                                              array (
                                              ),
                                               'prefixes' => 
                                              array (
                                                '/' => 
                                                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                                   'literals' => 
                                                  array (
                                                  ),
                                                   'prefixes' => 
                                                  array (
                                                  ),
                                                   'regexps' => 
                                                  array (
                                                    '(?<comment_id>[^/]+)' => 
                                                    HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                                       'map' => NULL,
                                                       'responder' => 'repositories_workspace_repo_slug_issues_issue_id_comments_comment_id',
                                                    )),
                                                  ),
                                                )),
                                              ),
                                               'regexps' => 
                                              array (
                                              ),
                                            )),
                                          ),
                                           'regexps' => 
                                          array (
                                          ),
                                        )),
                                         'responder' => NULL,
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/merg' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'e-base/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<revspec>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_merge_base_revspec',
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/mile' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'stones/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<milestone_id>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_milestones_milestone_id',
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/patc' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'h/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<spec>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_patch_spec',
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/pipe' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'lines-' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                      'config/caches/' => 
                                      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                         'literals' => 
                                        array (
                                        ),
                                         'prefixes' => 
                                        array (
                                        ),
                                         'regexps' => 
                                        array (
                                          '(?<cache_uuid>[^/]+)' => 
                                          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                             'map' => 
                                            HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                               'literals' => 
                                              array (
                                                '' => 'repositories_workspace_repo_slug_pipelines_config_caches_cache_uuid',
                                                '/content-uri' => 'repositories_workspace_repo_slug_pipelines_config_caches_cache_uuid_content_uri',
                                              ),
                                               'prefixes' => 
                                              array (
                                              ),
                                               'regexps' => 
                                              array (
                                              ),
                                            )),
                                             'responder' => NULL,
                                          )),
                                        ),
                                      )),
                                    ),
                                     'regexps' => 
                                    array (
                                    ),
                                  )),
                                  'lines/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<pipeline_uuid>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => 
                                        HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                           'literals' => 
                                          array (
                                            '' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid',
                                            '/steps/' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_steps',
                                            '/stopPipeline' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_stopPipeline',
                                          ),
                                           'prefixes' => 
                                          array (
                                            '/steps/' => 
                                            HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                               'literals' => 
                                              array (
                                              ),
                                               'prefixes' => 
                                              array (
                                              ),
                                               'regexps' => 
                                              array (
                                                '(?<step_uuid>[^/]+)' => 
                                                HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                                   'map' => 
                                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                                     'literals' => 
                                                    array (
                                                      '' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_steps_step_uuid',
                                                      '/log' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_steps_step_uuid_log',
                                                      '/test_reports' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_steps_step_uuid_test_reports',
                                                      '/test_reports/test_cases' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_steps_step_uuid_test_reports_test_cases',
                                                    ),
                                                     'prefixes' => 
                                                    array (
                                                      '/logs/' => 
                                                      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                                         'literals' => 
                                                        array (
                                                        ),
                                                         'prefixes' => 
                                                        array (
                                                        ),
                                                         'regexps' => 
                                                        array (
                                                          '(?<log_uuid>[^/]+)' => 
                                                          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                                             'map' => NULL,
                                                             'responder' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_steps_step_uuid_logs_log_uuid',
                                                          )),
                                                        ),
                                                      )),
                                                      '/test_' => 
                                                      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                                         'literals' => 
                                                        array (
                                                        ),
                                                         'prefixes' => 
                                                        array (
                                                          'reports/test_cases/' => 
                                                          HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                                             'literals' => 
                                                            array (
                                                            ),
                                                             'prefixes' => 
                                                            array (
                                                            ),
                                                             'regexps' => 
                                                            array (
                                                              '(?<test_case_uuid>[^/]+)/test_case_reasons' => 
                                                              HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                                                 'map' => NULL,
                                                                 'responder' => 'repositories_workspace_repo_slug_pipelines_pipeline_uuid_steps_step_uuid_test_reports_test_cases_test_case_uuid_test_case_reasons',
                                                              )),
                                                            ),
                                                          )),
                                                        ),
                                                         'regexps' => 
                                                        array (
                                                        ),
                                                      )),
                                                    ),
                                                     'regexps' => 
                                                    array (
                                                    ),
                                                  )),
                                                   'responder' => NULL,
                                                )),
                                              ),
                                            )),
                                          ),
                                           'regexps' => 
                                          array (
                                          ),
                                        )),
                                         'responder' => NULL,
                                      )),
                                    ),
                                  )),
                                  'lines_' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                      'config/schedules/' => 
                                      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                         'literals' => 
                                        array (
                                        ),
                                         'prefixes' => 
                                        array (
                                        ),
                                         'regexps' => 
                                        array (
                                          '(?<schedule_uuid>[^/]+)' => 
                                          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                             'map' => 
                                            HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                               'literals' => 
                                              array (
                                                '' => 'repositories_workspace_repo_slug_pipelines_config_schedules_schedule_uuid',
                                                '/executions/' => 'repositories_workspace_repo_slug_pipelines_config_schedules_schedule_uuid_executions',
                                              ),
                                               'prefixes' => 
                                              array (
                                              ),
                                               'regexps' => 
                                              array (
                                              ),
                                            )),
                                             'responder' => NULL,
                                          )),
                                        ),
                                      )),
                                      'config/ssh/known_' => 
                                      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                         'literals' => 
                                        array (
                                        ),
                                         'prefixes' => 
                                        array (
                                          'hosts/' => 
                                          HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                             'literals' => 
                                            array (
                                            ),
                                             'prefixes' => 
                                            array (
                                            ),
                                             'regexps' => 
                                            array (
                                              '(?<known_host_uuid>[^/]+)' => 
                                              HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                                 'map' => NULL,
                                                 'responder' => 'repositories_workspace_repo_slug_pipelines_config_ssh_known_hosts_known_host_uuid',
                                              )),
                                            ),
                                          )),
                                        ),
                                         'regexps' => 
                                        array (
                                        ),
                                      )),
                                      'config/variables/' => 
                                      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                         'literals' => 
                                        array (
                                        ),
                                         'prefixes' => 
                                        array (
                                        ),
                                         'regexps' => 
                                        array (
                                          '(?<variable_uuid>[^/]+)' => 
                                          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                             'map' => NULL,
                                             'responder' => 'repositories_workspace_repo_slug_pipelines_config_variables_variable_uuid',
                                          )),
                                        ),
                                      )),
                                    ),
                                     'regexps' => 
                                    array (
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/prop' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'erties/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<app_key>[^/]+)/(?<property_name>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_properties_app_key_property_name',
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/pull' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'requests/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<pull_request_id>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => 
                                        HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                           'literals' => 
                                          array (
                                            '' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id',
                                            '/activity' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_activity',
                                            '/approve' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_approve',
                                            '/comments' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_comments',
                                            '/commits' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_commits',
                                            '/decline' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_decline',
                                            '/diff' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_diff',
                                            '/diffstat' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_diffstat',
                                            '/merge' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_merge',
                                            '/patch' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_patch',
                                            '/request-changes' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_request_changes',
                                            '/statuses' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_statuses',
                                          ),
                                           'prefixes' => 
                                          array (
                                            '/comments/' => 
                                            HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                               'literals' => 
                                              array (
                                              ),
                                               'prefixes' => 
                                              array (
                                              ),
                                               'regexps' => 
                                              array (
                                                '(?<comment_id>[^/]+)' => 
                                                HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                                   'map' => NULL,
                                                   'responder' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_comments_comment_id',
                                                )),
                                              ),
                                            )),
                                            '/merge/tas' => 
                                            HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                               'literals' => 
                                              array (
                                              ),
                                               'prefixes' => 
                                              array (
                                                'k-status/' => 
                                                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                                   'literals' => 
                                                  array (
                                                  ),
                                                   'prefixes' => 
                                                  array (
                                                  ),
                                                   'regexps' => 
                                                  array (
                                                    '(?<task_id>[^/]+)' => 
                                                    HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                                       'map' => NULL,
                                                       'responder' => 'repositories_workspace_repo_slug_pullrequests_pull_request_id_merge_task_status_task_id',
                                                    )),
                                                  ),
                                                )),
                                              ),
                                               'regexps' => 
                                              array (
                                              ),
                                            )),
                                          ),
                                           'regexps' => 
                                          array (
                                          ),
                                        )),
                                         'responder' => NULL,
                                      )),
                                      '(?<pullrequest_id>[^/]+)/properties/(?<app_key>[^/]+)/(?<property_name>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_pullrequests_pullrequest_id_properties_app_key_property_name',
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/refs' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  '/branc' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                      'hes/' => 
                                      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                         'literals' => 
                                        array (
                                        ),
                                         'prefixes' => 
                                        array (
                                        ),
                                         'regexps' => 
                                        array (
                                          '(?<name>[^/]+)' => 
                                          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                             'map' => NULL,
                                             'responder' => 'repositories_workspace_repo_slug_refs_branches_name',
                                          )),
                                        ),
                                      )),
                                    ),
                                     'regexps' => 
                                    array (
                                    ),
                                  )),
                                  '/tags/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<name>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_refs_tags_name',
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                              '/src/' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                ),
                                 'regexps' => 
                                array (
                                  '(?<commit>[^/]+)/(?<path>[^/]+)' => 
                                  HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                     'map' => NULL,
                                     'responder' => 'repositories_workspace_repo_slug_src_commit_path',
                                  )),
                                ),
                              )),
                              '/vers' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'ions/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<version_id>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'repositories_workspace_repo_slug_versions_version_id',
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                ),
                              )),
                            ),
                             'regexps' => 
                            array (
                            ),
                          )),
                           'responder' => NULL,
                        )),
                      ),
                    )),
                  ),
                   'regexps' => 
                  array (
                  ),
                )),
                 'responder' => NULL,
              )),
            ),
          )),
        ),
         'regexps' => 
        array (
        ),
      )),
      '/snippe' => 
      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
         'literals' => 
        array (
        ),
         'prefixes' => 
        array (
          'ts/' => 
          HackRouting\PrefixMatching\PrefixMap::__set_state(array(
             'literals' => 
            array (
            ),
             'prefixes' => 
            array (
            ),
             'regexps' => 
            array (
              '(?<workspace>[^/]+)' => 
              HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                 'map' => 
                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                   'literals' => 
                  array (
                    '' => 'snippets_workspace',
                  ),
                   'prefixes' => 
                  array (
                    '/' => 
                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                       'literals' => 
                      array (
                      ),
                       'prefixes' => 
                      array (
                      ),
                       'regexps' => 
                      array (
                        '(?<encoded_id>[^/]+)' => 
                        HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                           'map' => 
                          HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                             'literals' => 
                            array (
                              '' => 'snippets_workspace_encoded_id',
                              '/comments' => 'snippets_workspace_encoded_id_comments',
                              '/commits' => 'snippets_workspace_encoded_id_commits',
                              '/watch' => 'snippets_workspace_encoded_id_watch',
                              '/watchers' => 'snippets_workspace_encoded_id_watchers',
                            ),
                             'prefixes' => 
                            array (
                              '/' => 
                              HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                 'literals' => 
                                array (
                                ),
                                 'prefixes' => 
                                array (
                                  'commen' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                      'ts/' => 
                                      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                         'literals' => 
                                        array (
                                        ),
                                         'prefixes' => 
                                        array (
                                        ),
                                         'regexps' => 
                                        array (
                                          '(?<comment_id>[^/]+)' => 
                                          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                             'map' => NULL,
                                             'responder' => 'snippets_workspace_encoded_id_comments_comment_id',
                                          )),
                                        ),
                                      )),
                                    ),
                                     'regexps' => 
                                    array (
                                    ),
                                  )),
                                  'commit' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                      's/' => 
                                      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                         'literals' => 
                                        array (
                                        ),
                                         'prefixes' => 
                                        array (
                                        ),
                                         'regexps' => 
                                        array (
                                          '(?<revision>[^/]+)' => 
                                          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                             'map' => NULL,
                                             'responder' => 'snippets_workspace_encoded_id_commits_revision',
                                          )),
                                        ),
                                      )),
                                    ),
                                     'regexps' => 
                                    array (
                                    ),
                                  )),
                                  'files/' => 
                                  HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                     'literals' => 
                                    array (
                                    ),
                                     'prefixes' => 
                                    array (
                                    ),
                                     'regexps' => 
                                    array (
                                      '(?<path>[^/]+)' => 
                                      HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                         'map' => NULL,
                                         'responder' => 'snippets_workspace_encoded_id_files_path',
                                      )),
                                    ),
                                  )),
                                ),
                                 'regexps' => 
                                array (
                                  '(?<node_id>[^/]+)' => 
                                  HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                     'map' => 
                                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                       'literals' => 
                                      array (
                                        '' => 'snippets_workspace_encoded_id_node_id',
                                      ),
                                       'prefixes' => 
                                      array (
                                        '/files/' => 
                                        HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                           'literals' => 
                                          array (
                                          ),
                                           'prefixes' => 
                                          array (
                                          ),
                                           'regexps' => 
                                          array (
                                            '(?<path>[^/]+)' => 
                                            HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                               'map' => NULL,
                                               'responder' => 'snippets_workspace_encoded_id_node_id_files_path',
                                            )),
                                          ),
                                        )),
                                      ),
                                       'regexps' => 
                                      array (
                                      ),
                                    )),
                                     'responder' => NULL,
                                  )),
                                  '(?<revision>[^/]+)' => 
                                  HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                                     'map' => 
                                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                                       'literals' => 
                                      array (
                                        '/diff' => 'snippets_workspace_encoded_id_revision_diff',
                                        '/patch' => 'snippets_workspace_encoded_id_revision_patch',
                                      ),
                                       'prefixes' => 
                                      array (
                                      ),
                                       'regexps' => 
                                      array (
                                      ),
                                    )),
                                     'responder' => NULL,
                                  )),
                                ),
                              )),
                            ),
                             'regexps' => 
                            array (
                            ),
                          )),
                           'responder' => NULL,
                        )),
                      ),
                    )),
                  ),
                   'regexps' => 
                  array (
                  ),
                )),
                 'responder' => NULL,
              )),
            ),
          )),
        ),
         'regexps' => 
        array (
        ),
      )),
      '/teams/' => 
      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
         'literals' => 
        array (
        ),
         'prefixes' => 
        array (
        ),
         'regexps' => 
        array (
          '(?<username>[^/]+)' => 
          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
             'map' => 
            HackRouting\PrefixMatching\PrefixMap::__set_state(array(
               'literals' => 
              array (
                '' => 'teams_username',
                '/followers' => 'teams_username_followers',
                '/following' => 'teams_username_following',
                '/hooks' => 'teams_username_hooks',
                '/members' => 'teams_username_members',
                '/permissions' => 'teams_username_permissions',
                '/permissions/repositories' => 'teams_username_permissions_repositories',
                '/pipelines_config/variables/' => 'teams_username_pipelines_config_variables',
                '/projects/' => 'teams_username_projects',
                '/search/code' => 'teams_username_search_code',
              ),
               'prefixes' => 
              array (
                '/hooks/' => 
                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                   'literals' => 
                  array (
                  ),
                   'prefixes' => 
                  array (
                  ),
                   'regexps' => 
                  array (
                    '(?<uid>[^/]+)' => 
                    HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                       'map' => NULL,
                       'responder' => 'teams_username_hooks_uid',
                    )),
                  ),
                )),
                '/permis' => 
                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                   'literals' => 
                  array (
                  ),
                   'prefixes' => 
                  array (
                    'sions/repositories/' => 
                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                       'literals' => 
                      array (
                      ),
                       'prefixes' => 
                      array (
                      ),
                       'regexps' => 
                      array (
                        '(?<repo_slug>[^/]+)' => 
                        HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                           'map' => NULL,
                           'responder' => 'teams_username_permissions_repositories_repo_slug',
                        )),
                      ),
                    )),
                  ),
                   'regexps' => 
                  array (
                  ),
                )),
                '/pipeli' => 
                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                   'literals' => 
                  array (
                  ),
                   'prefixes' => 
                  array (
                    'nes_config/variables/' => 
                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                       'literals' => 
                      array (
                      ),
                       'prefixes' => 
                      array (
                      ),
                       'regexps' => 
                      array (
                        '(?<variable_uuid>[^/]+)' => 
                        HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                           'map' => NULL,
                           'responder' => 'teams_username_pipelines_config_variables_variable_uuid',
                        )),
                      ),
                    )),
                  ),
                   'regexps' => 
                  array (
                  ),
                )),
                '/projec' => 
                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                   'literals' => 
                  array (
                  ),
                   'prefixes' => 
                  array (
                    'ts/' => 
                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                       'literals' => 
                      array (
                      ),
                       'prefixes' => 
                      array (
                      ),
                       'regexps' => 
                      array (
                        '(?<project_key>[^/]+)' => 
                        HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                           'map' => NULL,
                           'responder' => 'teams_username_projects_project_key',
                        )),
                      ),
                    )),
                  ),
                   'regexps' => 
                  array (
                  ),
                )),
              ),
               'regexps' => 
              array (
              ),
            )),
             'responder' => NULL,
          )),
          '(?<workspace>[^/]+)/repositories' => 
          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
             'map' => NULL,
             'responder' => 'teams_workspace_repositories',
          )),
        ),
      )),
      '/user/e' => 
      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
         'literals' => 
        array (
        ),
         'prefixes' => 
        array (
          'mails/' => 
          HackRouting\PrefixMatching\PrefixMap::__set_state(array(
             'literals' => 
            array (
            ),
             'prefixes' => 
            array (
            ),
             'regexps' => 
            array (
              '(?<email>[^/]+)' => 
              HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                 'map' => NULL,
                 'responder' => 'user_emails_email',
              )),
            ),
          )),
        ),
         'regexps' => 
        array (
        ),
      )),
      '/users/' => 
      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
         'literals' => 
        array (
        ),
         'prefixes' => 
        array (
        ),
         'regexps' => 
        array (
          '(?<selected_user>[^/]+)' => 
          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
             'map' => 
            HackRouting\PrefixMatching\PrefixMap::__set_state(array(
               'literals' => 
              array (
                '' => 'users_selected_user',
                '/hooks' => 'users_selected_user_hooks',
                '/pipelines_config/variables/' => 'users_selected_user_pipelines_config_variables',
                '/search/code' => 'users_selected_user_search_code',
                '/ssh-keys' => 'users_selected_user_ssh_keys',
              ),
               'prefixes' => 
              array (
                '/hooks/' => 
                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                   'literals' => 
                  array (
                  ),
                   'prefixes' => 
                  array (
                  ),
                   'regexps' => 
                  array (
                    '(?<uid>[^/]+)' => 
                    HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                       'map' => NULL,
                       'responder' => 'users_selected_user_hooks_uid',
                    )),
                  ),
                )),
                '/pipeli' => 
                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                   'literals' => 
                  array (
                  ),
                   'prefixes' => 
                  array (
                    'nes_config/variables/' => 
                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                       'literals' => 
                      array (
                      ),
                       'prefixes' => 
                      array (
                      ),
                       'regexps' => 
                      array (
                        '(?<variable_uuid>[^/]+)' => 
                        HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                           'map' => NULL,
                           'responder' => 'users_selected_user_pipelines_config_variables_variable_uuid',
                        )),
                      ),
                    )),
                  ),
                   'regexps' => 
                  array (
                  ),
                )),
                '/proper' => 
                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                   'literals' => 
                  array (
                  ),
                   'prefixes' => 
                  array (
                    'ties/' => 
                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                       'literals' => 
                      array (
                      ),
                       'prefixes' => 
                      array (
                      ),
                       'regexps' => 
                      array (
                        '(?<app_key>[^/]+)/(?<property_name>[^/]+)' => 
                        HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                           'map' => NULL,
                           'responder' => 'users_selected_user_properties_app_key_property_name',
                        )),
                      ),
                    )),
                  ),
                   'regexps' => 
                  array (
                  ),
                )),
                '/ssh-ke' => 
                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                   'literals' => 
                  array (
                  ),
                   'prefixes' => 
                  array (
                    'ys/' => 
                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                       'literals' => 
                      array (
                      ),
                       'prefixes' => 
                      array (
                      ),
                       'regexps' => 
                      array (
                        '(?<key_id>[^/]+)' => 
                        HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                           'map' => NULL,
                           'responder' => 'users_selected_user_ssh_keys_key_id',
                        )),
                      ),
                    )),
                  ),
                   'regexps' => 
                  array (
                  ),
                )),
              ),
               'regexps' => 
              array (
              ),
            )),
             'responder' => NULL,
          )),
          '(?<username>[^/]+)/members' => 
          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
             'map' => NULL,
             'responder' => 'users_username_members',
          )),
          '(?<workspace>[^/]+)/repositories' => 
          HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
             'map' => NULL,
             'responder' => 'users_workspace_repositories',
          )),
        ),
      )),
      '/worksp' => 
      HackRouting\PrefixMatching\PrefixMap::__set_state(array(
         'literals' => 
        array (
        ),
         'prefixes' => 
        array (
          'aces/' => 
          HackRouting\PrefixMatching\PrefixMap::__set_state(array(
             'literals' => 
            array (
            ),
             'prefixes' => 
            array (
            ),
             'regexps' => 
            array (
              '(?<workspace>[^/]+)' => 
              HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                 'map' => 
                HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                   'literals' => 
                  array (
                    '' => 'workspaces_workspace',
                    '/hooks' => 'workspaces_workspace_hooks',
                    '/members' => 'workspaces_workspace_members',
                    '/permissions' => 'workspaces_workspace_permissions',
                    '/permissions/repositories' => 'workspaces_workspace_permissions_repositories',
                    '/pipelines-config/identity/oidc/.well-known/openid-configuration' => 'workspaces_workspace_pipelines_config_identity_oidc_well_known_openid_configuration',
                    '/pipelines-config/identity/oidc/keys.json' => 'workspaces_workspace_pipelines_config_identity_oidc_keys_json',
                    '/pipelines-config/variables' => 'workspaces_workspace_pipelines_config_variables',
                    '/projects' => 'workspaces_workspace_projects',
                    '/search/code' => 'workspaces_workspace_search_code',
                  ),
                   'prefixes' => 
                  array (
                    '/hooks/' => 
                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                       'literals' => 
                      array (
                      ),
                       'prefixes' => 
                      array (
                      ),
                       'regexps' => 
                      array (
                        '(?<uid>[^/]+)' => 
                        HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                           'map' => NULL,
                           'responder' => 'workspaces_workspace_hooks_uid',
                        )),
                      ),
                    )),
                    '/member' => 
                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                       'literals' => 
                      array (
                      ),
                       'prefixes' => 
                      array (
                        's/' => 
                        HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                           'literals' => 
                          array (
                          ),
                           'prefixes' => 
                          array (
                          ),
                           'regexps' => 
                          array (
                            '(?<member>[^/]+)' => 
                            HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                               'map' => NULL,
                               'responder' => 'workspaces_workspace_members_member',
                            )),
                          ),
                        )),
                      ),
                       'regexps' => 
                      array (
                      ),
                    )),
                    '/permis' => 
                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                       'literals' => 
                      array (
                      ),
                       'prefixes' => 
                      array (
                        'sions/repositories/' => 
                        HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                           'literals' => 
                          array (
                          ),
                           'prefixes' => 
                          array (
                          ),
                           'regexps' => 
                          array (
                            '(?<repo_slug>[^/]+)' => 
                            HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                               'map' => NULL,
                               'responder' => 'workspaces_workspace_permissions_repositories_repo_slug',
                            )),
                          ),
                        )),
                      ),
                       'regexps' => 
                      array (
                      ),
                    )),
                    '/pipeli' => 
                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                       'literals' => 
                      array (
                      ),
                       'prefixes' => 
                      array (
                        'nes-config/variables/' => 
                        HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                           'literals' => 
                          array (
                          ),
                           'prefixes' => 
                          array (
                          ),
                           'regexps' => 
                          array (
                            '(?<variable_uuid>[^/]+)' => 
                            HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                               'map' => NULL,
                               'responder' => 'workspaces_workspace_pipelines_config_variables_variable_uuid',
                            )),
                          ),
                        )),
                      ),
                       'regexps' => 
                      array (
                      ),
                    )),
                    '/projec' => 
                    HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                       'literals' => 
                      array (
                      ),
                       'prefixes' => 
                      array (
                        'ts/' => 
                        HackRouting\PrefixMatching\PrefixMap::__set_state(array(
                           'literals' => 
                          array (
                          ),
                           'prefixes' => 
                          array (
                          ),
                           'regexps' => 
                          array (
                            '(?<project_key>[^/]+)' => 
                            HackRouting\PrefixMatching\PrefixMapOrResponder::__set_state(array(
                               'map' => NULL,
                               'responder' => 'workspaces_workspace_projects_project_key',
                            )),
                          ),
                        )),
                      ),
                       'regexps' => 
                      array (
                      ),
                    )),
                  ),
                   'regexps' => 
                  array (
                  ),
                )),
                 'responder' => NULL,
              )),
            ),
          )),
        ),
         'regexps' => 
        array (
        ),
      )),
    ),
     'regexps' => 
    array (
    ),
  )),
);